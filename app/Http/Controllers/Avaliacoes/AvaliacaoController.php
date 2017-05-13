<?php

namespace App\Http\Controllers\Avaliacoes;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Avaliacao;
use App\Models\Professor;
use App\Models\Questao;
use App\Models\Aluno;
use App\Models\Ponto;
use Response;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Avaliacao\AvaliacaoRequest;
use Auth;
class AvaliacaoController extends Controller
{
    


	public function index()
	{
		/*$professor = Professor::find($id);
        
        $avaliacao = DB::table()*/

        $avaliacoes = Professor::with('avaliacoes')->find(\Auth::user()->id)->avaliacoes;

		return view('avaliacao.index')->with('avaliacoes', $avaliacoes);
    }


    public function formulario()
    {
    	$professor = Professor::find(Auth::user()->id);
    	
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


    public function trazerQuestao()
    {
    	
        $disciplina_id = Input::get('disciplina_id');
        $disciplina_nome = Input::get('disciplina_nome');
        $professor_id = Input::get('professor_id');
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
        $questao_numero = Input::get('questao_numero');
        $questao = "";
        
        switch ($questao_numero) 
        {
            case 1:
                $questao = Questao::buscarQuestao($disciplina_id, $nivel_id);
                break;
            case 2:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq2_id);
                break;
            case 3:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq3_id);
                break;
            case 4:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq4_id);
                break;
            case 5:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq5_id);
                break;
            case 6:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq6_id);
                break;
            case 7:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq7_id);
                break;
            case 8:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq8_id);
                break;
            case 9:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq9_id);
                break;
            case 10:
                $questao = Questao::buscarQuestao($disciplina_id, $nivelq10_id);
                break;
            
            default:
                break;
        }
    
        return Response::json($questao);    
    }




    public function salvar(Request $request)
    {
    	$avaliacao = new Avaliacao;
    	# VERIFICAR SE É MELHOR QUESTAO_TURMA OU AVALIACAO_TURMA
    	# a questao referente a discplina e para todos, mas na hora de gerar a prova o professor
    	# deve adicionar a questão a turma para depois gerar a prova.
    	//$avaliacao->professor_id = $request->professor_id;
        $avaliacao->qtd = $request->qtd;
        $avaliacao->professor()->associate($request->professor_id);
        $avaliacao->disciplina()->associate($request->disciplina);
        $avaliacao->turma()->associate($request->turma);
        $resultado = Avaliacao::checarSeAvaliacaoExiste($request->professor_id, $request->turma, $request->disciplina, 'disponivel', 'pendente');
        
        foreach($resultado as $resultado)
        {
            if(count($resultado) > 0 && $resultado->status == 'pendente' || $resultado->status == 'disponivel' )
            {
                $request->session()->flash('alert-danger', 'Já existe uma Avaliação criada para esta turma!');
                return redirect('professor');
            }
        }
        if($avaliacao->save())
        {
            $zero[] = 0;

 /*           if(!count($request->questao6_id)>0)
            {
                
                $avaliacao->questoes()->sync($zero, false);
            }

            if(!count($request->questao7_id)>0)
            {
                $avaliacao->questoes()->sync($zero, false);
            }

            if(!count($request->questao8_id))
            {

                $avaliacao->questoes()->sync($zero, false);
            }

            if(!count($request->questao9_id)>0)
            {
                $avaliacao->questoes()->sync($zero, false);
            }

            if(!count($request->questao10_id)>0)
            {
                $avaliacao->questoes()->sync($zero, false);
            }*/

            switch ($request->qtd) {
                
                case 5:

                    $avaliacao->questoes()->sync($request->questao_id, false);
                    $avaliacao->questoes()->sync($request->questao2_id, false);
                    $avaliacao->questoes()->sync($request->questao3_id, false);
                    $avaliacao->questoes()->sync($request->questao4_id, false);
                    $avaliacao->questoes()->sync($request->questao5_id, false);

                break;

                case 6:

                    $avaliacao->questoes()->sync($request->questao_id, false);
                    $avaliacao->questoes()->sync($request->questao2_id, false);
                    $avaliacao->questoes()->sync($request->questao3_id, false);
                    $avaliacao->questoes()->sync($request->questao4_id, false);
                    $avaliacao->questoes()->sync($request->questao5_id, false);
                    $avaliacao->questoes()->sync($request->questao6_id, false);

                break; 

                case 7:

                    $avaliacao->questoes()->sync($request->questao_id, false);
                    $avaliacao->questoes()->sync($request->questao2_id, false);
                    $avaliacao->questoes()->sync($request->questao3_id, false);
                    $avaliacao->questoes()->sync($request->questao4_id, false);
                    $avaliacao->questoes()->sync($request->questao5_id, false);
                    $avaliacao->questoes()->sync($request->questao6_id, false);
                    $avaliacao->questoes()->sync($request->questao7_id, false);

                break; 

                case 8:

                    $avaliacao->questoes()->sync($request->questao_id, false);
                    $avaliacao->questoes()->sync($request->questao2_id, false);
                    $avaliacao->questoes()->sync($request->questao3_id, false);
                    $avaliacao->questoes()->sync($request->questao4_id, false);
                    $avaliacao->questoes()->sync($request->questao5_id, false);
                    $avaliacao->questoes()->sync($request->questao6_id, false);
                    $avaliacao->questoes()->sync($request->questao7_id, false);
                    $avaliacao->questoes()->sync($request->questao8_id, false);

                break; 

                case 9:

                    $avaliacao->questoes()->sync($request->questao_id, false);
                    $avaliacao->questoes()->sync($request->questao2_id, false);
                    $avaliacao->questoes()->sync($request->questao3_id, false);
                    $avaliacao->questoes()->sync($request->questao4_id, false);
                    $avaliacao->questoes()->sync($request->questao5_id, false);
                    $avaliacao->questoes()->sync($request->questao6_id, false);
                    $avaliacao->questoes()->sync($request->questao7_id, false);
                    $avaliacao->questoes()->sync($request->questao8_id, false);
                    $avaliacao->questoes()->sync($request->questao9_id, false);

                break; 

                case 10:

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
                break;             
            }
            
/*            $avaliacao->questoes()->sync($request->questao_id, false);
            $avaliacao->questoes()->sync($request->questao2_id, false);
            $avaliacao->questoes()->sync($request->questao3_id, false);
            $avaliacao->questoes()->sync($request->questao4_id, false);
            $avaliacao->questoes()->sync($request->questao5_id, false);
            $avaliacao->questoes()->sync($request->questao6_id, false);
            $avaliacao->questoes()->sync($request->questao7_id, false);
            $avaliacao->questoes()->sync($request->questao8_id, false);
            $avaliacao->questoes()->sync($request->questao9_id, false);
            $avaliacao->questoes()->sync($request->questao10_id, false);*/

        if(isset($request->q1_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q1_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao_id, false);
        }
        if(isset($request->q2_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q2_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao2_id, false);
        }
        if(isset($request->q3_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q3_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao3_id, false);
        }
        if(isset($request->q4_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q4_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao4_id, false);
        }
        if(isset($request->q5_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q5_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao5_id, false);
        }
        if(isset($request->q6_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q6_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao6_id, false);
        }
        if(isset($request->q7_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q7_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao7_id, false);
        }
        
        if(isset($request->q8_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q8_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao8_id, false);
        }
        if(isset($request->q9_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q9_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao9_id, false);
        }
        if(isset($request->q10_pontos))
        {
            $pontos = new Ponto;
            $pontos->valor = floatval($request->q10_pontos);
            $pontos->avaliacao()->associate($avaliacao->id);
            $pontos->save();
            $pontos->questoes()->sync($request->questao10_id, false);
        }

            $request->session()->flash('alert-success', 'Avaliação salva com sucesso!');
            return redirect ('professor');
        }

    }

/*    public function receberQuestao(Request $request)
    {
    	$avaliacao = new Avaliacao;
    	$avaliacao->professor_id = $request->professor_id;
    	$avaliacao->save();

    }*/

    public function mostrar($id)
    {
        $avaliacao = Avaliacao::find($id);
        return view('avaliacao.finalizada')->withAvaliacao($avaliacao);
    }

    public function paginaResultado($id)
    {
        $avaliacao = Avaliacao::find($id);
        $alternativas = \App\Models\Avaliacao::find($id)->alternativas;
        return view('alunos.resultado')->withAvaliacao($avaliacao)->with('alternativas', $alternativas);
    }


    public function realizadas()
    {
        $aluno = Aluno::find(Auth::user()->id);
        return view('alunos.realizadas')->withAluno($aluno);
    }

    public function status(Request $request)
    {
        $avaliacao = Avaliacao::find($request->id);
        $avaliacao->status = $request->status;

        if(!Avaliacao::checarStatusAvaliacao($avaliacao->professor_id, $avaliacao->id))
        {
            if($avaliacao->save())
            {
                $request->session()->flash('alert-success', 'Status alterado com sucesso!');
                return redirect()->back();
            }
        }
        else
        {
            $request->session()->flash('alert-warning', 'Status não pode ser alterado para disponível, já existe uma avaliação disponível!');
            return redirect()->back();        
        }


    }

}
