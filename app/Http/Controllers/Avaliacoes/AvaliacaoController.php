<?php

namespace App\Http\Controllers\Avaliacoes;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Avaliacao;
use App\Models\Professor;
use App\Models\Questao;
use Response;
use DB;
use Illuminate\Support\Facades\Input;
class AvaliacaoController extends Controller
{
    public function formulario($id)
    {
    	$professor = Professor::find($id);
    	
    	$questao = $this->buscarQuestao();

    	return view('avaliacao.formulario_avaliacao')->withProfessor($professor)
    												 ->with('questao', $questao);
    }

    public function buscarQuestao()
    {
    	
    	/*$questao = DB::table('questoes')->InRandomOrder()->first();
		return Response::json($questao);
*/
    }


    public function trazerQuestao(Request $request)
    {
    	
    	$disciplina_id = Input::get('disciplina_id');
    	$nivel_id = Input::get('nivel_id');

    	$questao = DB::table('questoes')
								    	->where('disciplina_id', '=', $disciplina_id)
								    	->where('nivel', '=', $nivel_id)
								    	->InRandomOrder()
								    	->first();

		return Response::json($questao);
    }




    public function salvar(Request $request)
    {
    	$avaliacao = new Avaliacao;
    	$avaliacao->questao = $request->questao;
    	$avaliacao->alternativaA = $request->a;
    	$avaliacao->alternativaB = $request->b;
    	$avaliacao->alternativaC = $request->c;
    	$avaliacao->alternativaD = $request->d;
    	$avaliacao->alternativaE = $request->e;


    	# VERIFICAR SE É MELHOR QUESTAO_TURMA OU AVALIACAO_TURMA
    	# a questao referente a discplina e para todos, mas na hora de gerar a prova o professor
    	# deve adicionar a questão a turma para depois gerar a prova.

        $avaliacao->save();
        $avaliacao->turmas()->sync($request->turmas, false);

        return redirect()->back();

    }
}
