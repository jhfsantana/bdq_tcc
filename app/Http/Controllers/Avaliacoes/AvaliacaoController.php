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
    


	public function index($id)
	{
		/*$professor = Professor::find($id);
        
        $avaliacao = DB::table()*/

        $avaliacoes = Professor::with('avaliacoes')->find($id)->avaliacoes;

		return view('avaliacao.index')->with('avaliacoes', $avaliacoes);
    }


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
        $nivelq2_id = Input::get('nivelq2_id');
        $nivelq3_id = Input::get('nivelq3_id');
        $nivelq4_id = Input::get('nivelq4_id');
        $nivelq5_id = Input::get('nivelq5_id');
        $nivelq6_id = Input::get('nivelq6_id');
        $nivelq7_id = Input::get('nivelq7_id');
        $nivelq8_id = Input::get('nivelq8_id');
        $nivelq9_id = Input::get('nivelq9_id');
        $nivelq10_id = Input::get('nivelq10_id');
        


    	$questao = DB::table('questoes')
								    	->where('disciplina_id', '=', $disciplina_id)
								    	->where('nivel', '=', $nivel_id)
                                        ->orWhere('nivel', '=', $nivelq2_id)
                                        ->orWhere('nivel', '=', $nivelq3_id)
                                        ->orWhere('nivel', '=', $nivelq4_id)
                                        ->orWhere('nivel', '=', $nivelq5_id)
                                        ->orWhere('nivel', '=', $nivelq6_id)
                                        ->orWhere('nivel', '=', $nivelq7_id)
                                        ->orWhere('nivel', '=', $nivelq8_id)
                                        ->orWhere('nivel', '=', $nivelq9_id)
                                        ->orWhere('nivel', '=', $nivelq10_id)
								    	->InRandomOrder()
								    	->first();

		return Response::json($questao);
    }




    public function salvar(Request $request)
    {
    	$avaliacao = new Avaliacao;
    	# VERIFICAR SE É MELHOR QUESTAO_TURMA OU AVALIACAO_TURMA
    	# a questao referente a discplina e para todos, mas na hora de gerar a prova o professor
    	# deve adicionar a questão a turma para depois gerar a prova.
    	//$avaliacao->professor_id = $request->professor_id;
        $avaliacao->professor()->associate($request->professor_id);
        $avaliacao->disciplina()->associate($request->disciplina);
        $avaliacao->turma()->associate($request->turma);
        
        
        if($avaliacao->save())
        {
            $avaliacao->questoes()->sync($request->questao_id, false);
            $avaliacao->questoes()->sync($request->questao2_id, false);
            $avaliacao->questoes()->sync($request->questao3_id, false);
            $avaliacao->questoes()->sync($request->questao4_id, false);
            $avaliacao->questoes()->sync($request->questao5_id, false);
            $avaliacao->questoes()->sync($request->questao6_id, false);
            $avaliacao->questoes()->sync($request->questao7_id, false);
            $avaliacao->questoes()->sync($request->questao8_id, false);
            $avaliacao->questoes()->sync($request->questao9_id, false);
            $avaliacao->questoes()->sync($request->questao10_id, false);
            
            $request->session()->flash('alert-success', 'Avaliação salva com sucesso!');
            return redirect ('professor');
        }

        



        

    }

    public function receberQuestao(Request $request)
    {
    	$avaliacao = new Avaliacao;
    	$avaliacao->professor_id = $request->professor_id;
    	$avaliacao->save();

    }

    public function mostrar($id)
    {
        $avaliacao = Avaliacao::find($id);
        return view('avaliacao.finalizada')->withAvaliacao($avaliacao);
    }
}
