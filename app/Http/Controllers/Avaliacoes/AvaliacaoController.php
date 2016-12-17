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




    	$questao = DB::table('questoes')
                                        ->where('disciplina_id', '=', $disciplina_id)
                                        ->where('nivel', '=', $nivel_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq2_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq3_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq4_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq5_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq6_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq7_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq8_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq9_id)
                                        ->orwhere('disciplina_id', '=', $disciplina_id)
                                        ->Where('nivel', '=', $nivelq10_id)
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
        return view('alunos.resultado')->withAvaliacao($avaliacao);
    }


    public function realizadas($id)
    {
        $aluno = Aluno::find($id);
        return view('alunos.realizadas')->withAluno($aluno);
    }

    public function status(Request $request)
    {
        $avaliacao = Avaliacao::find($request->id);

        $avaliacao->status = $request->status;
        
        if($avaliacao->save())
        {
            $request->session()->flash('alert-success', 'Status alterado com sucesso!');
            return redirect('/professor');
        }
    }

}
