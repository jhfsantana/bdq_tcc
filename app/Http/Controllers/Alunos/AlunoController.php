<?php

namespace App\Http\Controllers\Alunos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Aluno;

use App\Models\Disciplina;

use App\Models\Turma;

use App\Models\Professor;

use App\Models\Questao;
use App\Models\Avaliacao;
use App\Models\Resultado;
use App\Models\Alternativa;

use Illuminate\Support\Facades\Input;

use App\Http\Requests\Aluno\AlunoRequest;

use DB;
use Auth;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $alunos = Aluno::all();

       return view('alunos.alunos_lista')->with('alunos', $alunos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas = Disciplina::all();
        return view('alunos.formulario_aluno')->with('disciplinas', $disciplinas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        $aluno = new Aluno();

        $aluno->matricula = $request->matricula;
        $aluno->nome = $request->nome;
        $aluno->sobrenome = $request->sobrenome;
        $aluno->cpf = Util::somenteNumeros($request->cpf);
        $aluno->email = $request->email;
        $cryptPassword = bcrypt($request->password);
        $aluno->password = $cryptPassword;
        $aluno->save();

        $aluno->disciplinas()->sync($request->disciplinas, false);

        return redirect('alunos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::find($id);

        return view ('alunos.detalhes')->withAluno($aluno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formularioAlterar($id)
    {
        $aluno = Aluno::find($id);
        $disciplinas = Disciplina::all();
        return view('alunos.formulario_alterar_aluno')->withAluno($aluno)->with('disciplinas', $disciplinas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $aluno = Aluno::find($request->aluno_id);

        $aluno->nome = $request->nome;
        $aluno->sobrenome = $request->sobrenome;
        $aluno->cpf = $request->cpf;
        $aluno->email = $request->email;

        
        if($aluno->push())
        {
            $aluno->disciplinas()->sync($request->disciplinas, false);

            $request->session()->flash('alert-success', 'Aluno '.$aluno->nome. ' alterado com sucesso');
            return redirect('/alunos');
        }


    }
    public function desassociarDisciplina(Request $request)
    {
        $aluno = Aluno::find($request->aluno_id);

        $disciplina = [];
        $disciplina[] = $request->disciplina_id;

        $aluno->disciplinas()->detach($disciplina);
        return redirect()->back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::find($id);

        if($aluno->delete())
        {
            return redirect('/alunos')->with('msg', 'O aluno ' . $aluno->nome .' removido com sucesso');
        }
    }

    public function loginTela()
    {
        return view('alunos.auth');
    }

    public function bemvindo()
    {
        $usuario = Aluno::find(Auth::user()->id);
        $aluno = Aluno::ultimaNota();
        return view('alunos.index')->with('aluno', $aluno)->withAluno($usuario);
    }

    public function avaliacao(Request $request)
    {
        $avaliacao = Turma::with('avaliacoes')->find($request->turma_id)->avaliacoes->where('disciplina_id', '=', $request->disciplina_id)->where('id', '=', $request->avaliacao_id);
/*        $avaliacao = Avaliacao::find($request->avaliacao_id);*/

       // $avaliacao = Turma::with('avaliacoes')->find($request->turma_id)->avaliacoes;


        return view('alunos.avaliacao')->with('avaliacao', $avaliacao);
    }
    
    
    public function avaliacoesDisponiveis($id)
    {
        $aluno = Aluno::find($id);
        return view('alunos.avaliacao_disponivel')->withAluno($aluno);
    }

    public function correcao(Request $request)
    {
        $nota = 0.0;
        $questao1 = Questao::find(Input::get('questao_id1'));
        $questao2 = Questao::find(Input::get('questao_id2'));
        $questao3 = Questao::find(Input::get('questao_id3'));
        $questao4 = Questao::find(Input::get('questao_id4'));
        $questao5 = Questao::find(Input::get('questao_id5'));
        $questao6 = Questao::find(Input::get('questao_id6'));
        $questao7 = Questao::find(Input::get('questao_id7'));
        $questao8 = Questao::find(Input::get('questao_id8'));
        $questao9 = Questao::find(Input::get('questao_id9'));
        $questao10 = Questao::find(Input::get('questao_id10'));
        $avaliacao = Avaliacao::find($request->avaliacao_id);
        $resultado = new Resultado;
        
        if(isset($request->q1))
        {
            $alternativa = new Alternativa;
            $alternativa->alternativa_marcada = $request->q1;
            $alternativa->aluno()->associate($request->aluno_id);
            $alternativa->avaliacao()->associate($request->avaliacao_id);
            $alternativa->questao()->associate($request->questao_id1);
            $alternativa->save();
        }

        if(isset($request->q2))
        {
            $alternativa = new Alternativa;
            $alternativa->alternativa_marcada = $request->q2;
            $alternativa->aluno()->associate($request->aluno_id);
            $alternativa->avaliacao()->associate($request->avaliacao_id);
            $alternativa->questao()->associate($request->questao_id2);
            $alternativa->save();
        }

        if(isset($request->q3))
        {
            $alternativa = new Alternativa;
            $alternativa->alternativa_marcada = $request->q3;
            $alternativa->aluno()->associate($request->aluno_id);
            $alternativa->avaliacao()->associate($request->avaliacao_id);
            $alternativa->questao()->associate($request->questao_id3);
            $alternativa->save();
        }

        if(isset($request->q4))
        {
            $alternativa = new Alternativa;
            $alternativa->alternativa_marcada = $request->q4;
            $alternativa->aluno()->associate($request->aluno_id);
            $alternativa->avaliacao()->associate($request->avaliacao_id);
            $alternativa->questao()->associate($request->questao_id4);
            $alternativa->save();
        }

        if(isset($request->q5))
        {
            $alternativa = new Alternativa;
            $alternativa->alternativa_marcada = $request->q5;
            $alternativa->aluno()->associate($request->aluno_id);
            $alternativa->avaliacao()->associate($request->avaliacao_id);
            $alternativa->questao()->associate($request->questao_id5);
            $alternativa->save();
        }


/*        $ponto_questao1 = Questao::with('pontos')->find($request->questao_id1)->where('avaliacao_id', '=', $request->avaliacao_id);
        $ponto_questao2 = Questao::with('pontos')->find($request->questao_id2)->where('avaliacao_id', '=', $request->avaliacao_id);
        $ponto_questao3 = Questao::with('pontos')->find($request->questao_id3)->where('avaliacao_id', '=', $request->avaliacao_id);
        $ponto_questao4 = Questao::with('pontos')->find($request->questao_id4)->where('avaliacao_id', '=', $request->avaliacao_id);
        $ponto_questao5 = Questao::with('pontos')->find($request->questao_id5)->where('avaliacao_id', '=', $request->avaliacao_id);*/


        $ponto_questao1 = Questao::pegarPontos($request->questao_id1, $request->avaliacao_id);
        $ponto_questao2 = Questao::pegarPontos($request->questao_id2, $request->avaliacao_id);
        $ponto_questao3 = Questao::pegarPontos($request->questao_id3, $request->avaliacao_id);
        $ponto_questao4 = Questao::pegarPontos($request->questao_id4, $request->avaliacao_id);
        $ponto_questao5 = Questao::pegarPontos($request->questao_id5, $request->avaliacao_id);
        $ponto_questao6 = Questao::pegarPontos($request->questao_id6, $request->avaliacao_id);
        $ponto_questao7 = Questao::pegarPontos($request->questao_id7, $request->avaliacao_id);
        $ponto_questao8 = Questao::pegarPontos($request->questao_id8, $request->avaliacao_id);
        $ponto_questao9 = Questao::pegarPontos($request->questao_id9, $request->avaliacao_id);
        $ponto_questao10 = Questao::pegarPontos($request->questao_id10, $request->avaliacao_id);
       

    switch ($request->qtd_questao) {
       case 5:

        if(isset($request->q1))
        {
            foreach ($ponto_questao1 as $ponto_questao1) {
                    # code...
                if(count($ponto_questao1->valor) > 0)
                {
                    if($request->q1 == $questao1->correta)
                    {  
                        $nota+=$ponto_questao1->valor;
                    }
                }
                elseif(!count($ponto_questao1->valor) > 0 && $request->q1 == $questao1->correta)
                {
                    $nota+=2;
                }
            }
        }
            

        if(isset($request->q2))
        {
            foreach ($ponto_questao2 as $ponto_questao2) {
                    # code...
                if(count($ponto_questao2->valor) > 0)
                {
                    if($request->q2 == $questao2->correta)
                    {  
                        $nota+=$ponto_questao2->valor;
                    }
                }
                elseif(!count($ponto_questao2->valor) > 0 && $request->q2 == $questao2->correta)
                {
                    $nota+=2;
                }
            }
        }

        if(isset($request->q3))
        {
            foreach ($ponto_questao3 as $ponto_questao3) {
                    # code...
                if(count($ponto_questao3->valor) > 0)
                {
                    if($request->q3 == $questao3->correta)
                    {  
                        $nota+=$ponto_questao3->valor;
                    }
                }
                elseif(!count($ponto_questao3->valor) > 0 && $request->q3 == $questao3->correta)
                {
                    $nota+=2;
                }
            }  
        }

        if(isset($request->q4))
        {
            foreach ($ponto_questao4 as $ponto_questao4) {
                    # code...
                if(count($ponto_questao4->valor) > 0)
                {
                    if($request->q4 == $questao4->correta)
                    {  
                        $nota+=$ponto_questao4->valor;
                    }
                }
                elseif(!count($ponto_questao4->valor) > 0 && $request->q4 == $questao4->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q5))
        {
            foreach ($ponto_questao5 as $ponto_questao5) {
                    # code...
                if(count($ponto_questao5->valor) > 0)
                {
                    if($request->q5 == $questao5->correta)
                    {  
                        $nota+=$ponto_questao5->valor;
                    }
                }
                elseif(!count($ponto_questao5->valor) > 0 && $request->q5 == $questao5->correta)
                {
                    $nota+=2;
                }
            }   
        }
        ##FIM DO CASE 5 ##
        break;
       
       case 6:

        if(isset($request->q1))
        {
            foreach ($ponto_questao1 as $ponto_questao1) {
                    # code...
                if(count($ponto_questao1->valor) > 0)
                {
                    if($request->q1 == $questao1->correta)
                    {  
                        $nota+=$ponto_questao1->valor;
                    }
                }
                elseif(!count($ponto_questao1->valor) > 0 && $request->q1 == $questao1->correta)
                {
                    $nota+=2;
                }
            }
        }
            

        if(isset($request->q2))
        {
            foreach ($ponto_questao2 as $ponto_questao2) {
                    # code...
                if(count($ponto_questao2->valor) > 0)
                {
                    if($request->q2 == $questao2->correta)
                    {  
                        $nota+=$ponto_questao2->valor;
                    }
                }
                elseif(!count($ponto_questao2->valor) > 0 && $request->q2 == $questao2->correta)
                {
                    $nota+=2;
                }
            }
        }

        if(isset($request->q3))
        {
            foreach ($ponto_questao3 as $ponto_questao3) {
                    # code...
                if(count($ponto_questao3->valor) > 0)
                {
                    if($request->q3 == $questao3->correta)
                    {  
                        $nota+=$ponto_questao3->valor;
                    }
                }
                elseif(!count($ponto_questao3->valor) > 0 && $request->q3 == $questao3->correta)
                {
                    $nota+=2;
                }
            }  
        }

        if(isset($request->q4))
        {
            foreach ($ponto_questao4 as $ponto_questao4) {
                    # code...
                if(count($ponto_questao4->valor) > 0)
                {
                    if($request->q4 == $questao4->correta)
                    {  
                        $nota+=$ponto_questao4->valor;
                    }
                }
                elseif(!count($ponto_questao4->valor) > 0 && $request->q4 == $questao4->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q5))
        {
            foreach ($ponto_questao5 as $ponto_questao5) {
                    # code...
                if(count($ponto_questao5->valor) > 0)
                {
                    if($request->q5 == $questao5->correta)
                    {  
                        $nota+=$ponto_questao5->valor;
                    }
                }
                elseif(!count($ponto_questao5->valor) > 0 && $request->q5 == $questao5->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q6))
        {
            foreach ($ponto_questao6 as $ponto_questao6) {
                    # code...
                if(count($ponto_questao6->valor) > 0)
                {
                    if($request->q6 == $questao6->correta)
                    {  
                        $nota+=$ponto_questao6->valor;
                    }
                }
                elseif(!count($ponto_questao6->valor) > 0 && $request->q6 == $questao6->correta)
                {
                    $nota+=2;
                }
            }   
        }

        break;
        ##FIM DO CASE 6 ##
        case 7:

        if(isset($request->q1))
        {
            foreach ($ponto_questao1 as $ponto_questao1) {
                    # code...
                if(count($ponto_questao1->valor) > 0)
                {
                    if($request->q1 == $questao1->correta)
                    {  
                        $nota+=$ponto_questao1->valor;
                    }
                }
                elseif(!count($ponto_questao1->valor) > 0 && $request->q1 == $questao1->correta)
                {
                    $nota+=2;
                }
            }
        }
            

        if(isset($request->q2))
        {
            foreach ($ponto_questao2 as $ponto_questao2) {
                    # code...
                if(count($ponto_questao2->valor) > 0)
                {
                    if($request->q2 == $questao2->correta)
                    {  
                        $nota+=$ponto_questao2->valor;
                    }
                }
                elseif(!count($ponto_questao2->valor) > 0 && $request->q2 == $questao2->correta)
                {
                    $nota+=2;
                }
            }
        }

        if(isset($request->q3))
        {
            foreach ($ponto_questao3 as $ponto_questao3) {
                    # code...
                if(count($ponto_questao3->valor) > 0)
                {
                    if($request->q3 == $questao3->correta)
                    {  
                        $nota+=$ponto_questao3->valor;
                    }
                }
                elseif(!count($ponto_questao3->valor) > 0 && $request->q3 == $questao3->correta)
                {
                    $nota+=2;
                }
            }  
        }

        if(isset($request->q4))
        {
            foreach ($ponto_questao4 as $ponto_questao4) {
                    # code...
                if(count($ponto_questao4->valor) > 0)
                {
                    if($request->q4 == $questao4->correta)
                    {  
                        $nota+=$ponto_questao4->valor;
                    }
                }
                elseif(!count($ponto_questao4->valor) > 0 && $request->q4 == $questao4->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q5))
        {
            foreach ($ponto_questao5 as $ponto_questao5) {
                    # code...
                if(count($ponto_questao5->valor) > 0)
                {
                    if($request->q5 == $questao5->correta)
                    {  
                        $nota+=$ponto_questao5->valor;
                    }
                }
                elseif(!count($ponto_questao5->valor) > 0 && $request->q5 == $questao5->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q6))
        {
            foreach ($ponto_questao6 as $ponto_questao6) {
                    # code...
                if(count($ponto_questao6->valor) > 0)
                {
                    if($request->q6 == $questao6->correta)
                    {  
                        $nota+=$ponto_questao6->valor;
                    }
                }
                elseif(!count($ponto_questao6->valor) > 0 && $request->q6 == $questao6->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q7))
        {
            foreach ($ponto_questao7 as $ponto_questao7) {
                    # code...
                if(count($ponto_questao7->valor) > 0)
                {
                    if($request->q7 == $questao7->correta)
                    {  
                        $nota+=$ponto_questao7->valor;
                    }
                }
                elseif(!count($ponto_questao7->valor) > 0 && $request->q7 == $questao7->correta)
                {
                    $nota+=2;
                }
            }   
        }

        break;
         case 8:

        if(isset($request->q1))
        {
            foreach ($ponto_questao1 as $ponto_questao1) {
                    # code...
                if(count($ponto_questao1->valor) > 0)
                {
                    if($request->q1 == $questao1->correta)
                    {  
                        $nota+=$ponto_questao1->valor;
                    }
                }
                elseif(!count($ponto_questao1->valor) > 0 && $request->q1 == $questao1->correta)
                {
                    $nota+=2;
                }
            }
        }
            

        if(isset($request->q2))
        {
            foreach ($ponto_questao2 as $ponto_questao2) {
                    # code...
                if(count($ponto_questao2->valor) > 0)
                {
                    if($request->q2 == $questao2->correta)
                    {  
                        $nota+=$ponto_questao2->valor;
                    }
                }
                elseif(!count($ponto_questao2->valor) > 0 && $request->q2 == $questao2->correta)
                {
                    $nota+=2;
                }
            }
        }

        if(isset($request->q3))
        {
            foreach ($ponto_questao3 as $ponto_questao3) {
                    # code...
                if(count($ponto_questao3->valor) > 0)
                {
                    if($request->q3 == $questao3->correta)
                    {  
                        $nota+=$ponto_questao3->valor;
                    }
                }
                elseif(!count($ponto_questao3->valor) > 0 && $request->q3 == $questao3->correta)
                {
                    $nota+=2;
                }
            }  
        }

        if(isset($request->q4))
        {
            foreach ($ponto_questao4 as $ponto_questao4) {
                    # code...
                if(count($ponto_questao4->valor) > 0)
                {
                    if($request->q4 == $questao4->correta)
                    {  
                        $nota+=$ponto_questao4->valor;
                    }
                }
                elseif(!count($ponto_questao4->valor) > 0 && $request->q4 == $questao4->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q5))
        {
            foreach ($ponto_questao5 as $ponto_questao5) {
                    # code...
                if(count($ponto_questao5->valor) > 0)
                {
                    if($request->q5 == $questao5->correta)
                    {  
                        $nota+=$ponto_questao5->valor;
                    }
                }
                elseif(!count($ponto_questao5->valor) > 0 && $request->q5 == $questao5->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q6))
        {
            foreach ($ponto_questao6 as $ponto_questao6) {
                    # code...
                if(count($ponto_questao6->valor) > 0)
                {
                    if($request->q6 == $questao6->correta)
                    {  
                        $nota+=$ponto_questao6->valor;
                    }
                }
                elseif(!count($ponto_questao6->valor) > 0 && $request->q6 == $questao6->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q7))
        {
            foreach ($ponto_questao7 as $ponto_questao7) {
                    # code...
                if(count($ponto_questao7->valor) > 0)
                {
                    if($request->q7 == $questao7->correta)
                    {  
                        $nota+=$ponto_questao7->valor;
                    }
                }
                elseif(!count($ponto_questao7->valor) > 0 && $request->q7 == $questao7->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q8))
        {
            foreach ($ponto_questao8 as $ponto_questao8) {
                    # code...
                if(count($ponto_questao8->valor) > 0)
                {
                    if($request->q8 == $questao8->correta)
                    {  
                        $nota+=$ponto_questao8->valor;
                    }
                }
                elseif(!count($ponto_questao8->valor) > 0 && $request->q8 == $questao8->correta)
                {
                    $nota+=2;
                }
            }   
        }
            
        break;
        case 9:

        if(isset($request->q1))
        {
            foreach ($ponto_questao1 as $ponto_questao1) {
                    # code...
                if(count($ponto_questao1->valor) > 0)
                {
                    if($request->q1 == $questao1->correta)
                    {  
                        $nota+=$ponto_questao1->valor;
                    }
                }
                elseif(!count($ponto_questao1->valor) > 0 && $request->q1 == $questao1->correta)
                {
                    $nota+=2;
                }
            }
        }
            

        if(isset($request->q2))
        {
            foreach ($ponto_questao2 as $ponto_questao2) {
                    # code...
                if(count($ponto_questao2->valor) > 0)
                {
                    if($request->q2 == $questao2->correta)
                    {  
                        $nota+=$ponto_questao2->valor;
                    }
                }
                elseif(!count($ponto_questao2->valor) > 0 && $request->q2 == $questao2->correta)
                {
                    $nota+=2;
                }
            }
        }

        if(isset($request->q3))
        {
            foreach ($ponto_questao3 as $ponto_questao3) {
                    # code...
                if(count($ponto_questao3->valor) > 0)
                {
                    if($request->q3 == $questao3->correta)
                    {  
                        $nota+=$ponto_questao3->valor;
                    }
                }
                elseif(!count($ponto_questao3->valor) > 0 && $request->q3 == $questao3->correta)
                {
                    $nota+=2;
                }
            }  
        }

        if(isset($request->q4))
        {
            foreach ($ponto_questao4 as $ponto_questao4) {
                    # code...
                if(count($ponto_questao4->valor) > 0)
                {
                    if($request->q4 == $questao4->correta)
                    {  
                        $nota+=$ponto_questao4->valor;
                    }
                }
                elseif(!count($ponto_questao4->valor) > 0 && $request->q4 == $questao4->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q5))
        {
            foreach ($ponto_questao5 as $ponto_questao5) {
                    # code...
                if(count($ponto_questao5->valor) > 0)
                {
                    if($request->q5 == $questao5->correta)
                    {  
                        $nota+=$ponto_questao5->valor;
                    }
                }
                elseif(!count($ponto_questao5->valor) > 0 && $request->q5 == $questao5->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q6))
        {
            foreach ($ponto_questao6 as $ponto_questao6) {
                    # code...
                if(count($ponto_questao6->valor) > 0)
                {
                    if($request->q6 == $questao6->correta)
                    {  
                        $nota+=$ponto_questao6->valor;
                    }
                }
                elseif(!count($ponto_questao6->valor) > 0 && $request->q6 == $questao6->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q7))
        {
            foreach ($ponto_questao7 as $ponto_questao7) {
                    # code...
                if(count($ponto_questao7->valor) > 0)
                {
                    if($request->q7 == $questao7->correta)
                    {  
                        $nota+=$ponto_questao7->valor;
                    }
                }
                elseif(!count($ponto_questao7->valor) > 0 && $request->q7 == $questao7->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q8))
        {
            foreach ($ponto_questao8 as $ponto_questao8) {
                    # code...
                if(count($ponto_questao8->valor) > 0)
                {
                    if($request->q8 == $questao8->correta)
                    {  
                        $nota+=$ponto_questao8->valor;
                    }
                }
                elseif(!count($ponto_questao8->valor) > 0 && $request->q8 == $questao8->correta)
                {
                    $nota+=2;
                }
            }   
        }

        if(isset($request->q9))
        {
            foreach ($ponto_questao9 as $ponto_questao9) {
                    # code...
                if(count($ponto_questao9->valor) > 0)
                {
                    if($request->q9 == $questao9->correta)
                    {  
                        $nota+=$ponto_questao9->valor;
                    }
                }
                elseif(!count($ponto_questao9->valor) > 0 && $request->q9 == $questao9->correta)
                {
                    $nota+=2;
                }
            }   
        }
            
        break;
        case 10:

        if(isset($request->q1))
        {
            foreach ($ponto_questao1 as $ponto_questao1) {
                    # code...
                if(count($ponto_questao1->valor) > 0)
                {
                    if($request->q1 == $questao1->correta)
                    {  
                        $nota+=$ponto_questao1->valor;
                    }
                }
                elseif(!count($ponto_questao1->valor) > 0 && $request->q1 == $questao1->correta)
                {
                    $nota+=1;
                }
            }
        }
            

        if(isset($request->q2))
        {
            foreach ($ponto_questao2 as $ponto_questao2) {
                    # code...
                if(count($ponto_questao2->valor) > 0)
                {
                    if($request->q2 == $questao2->correta)
                    {  
                        $nota+=$ponto_questao2->valor;
                    }
                }
                elseif(!count($ponto_questao2->valor) > 0 && $request->q2 == $questao2->correta)
                {
                    $nota+=1;
                }
            }
        }

        if(isset($request->q3))
        {
            foreach ($ponto_questao3 as $ponto_questao3) {
                    # code...
                if(count($ponto_questao3->valor) > 0)
                {
                    if($request->q3 == $questao3->correta)
                    {  
                        $nota+=$ponto_questao3->valor;
                    }
                }
                elseif(!count($ponto_questao3->valor) > 0 && $request->q3 == $questao3->correta)
                {
                    $nota+=1;
                }
            }  
        }

        if(isset($request->q4))
        {
            foreach ($ponto_questao4 as $ponto_questao4) {
                    # code...
                if(count($ponto_questao4->valor) > 0)
                {
                    if($request->q4 == $questao4->correta)
                    {  
                        $nota+=$ponto_questao4->valor;
                    }
                }
                elseif(!count($ponto_questao4->valor) > 0 && $request->q4 == $questao4->correta)
                {
                    $nota+=1;
                }
            }   
        }

        if(isset($request->q5))
        {
            foreach ($ponto_questao5 as $ponto_questao5) {
                    # code...
                if(count($ponto_questao5->valor) > 0)
                {
                    if($request->q5 == $questao5->correta)
                    {  
                        $nota+=$ponto_questao5->valor;
                    }
                }
                elseif(!count($ponto_questao5->valor) > 0 && $request->q5 == $questao5->correta)
                {
                    $nota+=1;
                }
            }   
        }

        if(isset($request->q6))
        {
            foreach ($ponto_questao6 as $ponto_questao6) {
                    # code...
                if(count($ponto_questao6->valor) > 0)
                {
                    if($request->q6 == $questao6->correta)
                    {  
                        $nota+=$ponto_questao6->valor;
                    }
                }
                elseif(!count($ponto_questao6->valor) > 0 && $request->q6 == $questao6->correta)
                {
                    $nota+=1;
                }
            }   
        }

        if(isset($request->q7))
        {
            foreach ($ponto_questao7 as $ponto_questao7) {
                    # code...
                if(count($ponto_questao7->valor) > 0)
                {
                    if($request->q7 == $questao7->correta)
                    {  
                        $nota+=$ponto_questao7->valor;
                    }
                }
                elseif(!count($ponto_questao7->valor) > 0 && $request->q7 == $questao7->correta)
                {
                    $nota+=1;
                }
            }   
        }

        if(isset($request->q8))
        {
            foreach ($ponto_questao8 as $ponto_questao8) {
                    # code...
                if(count($ponto_questao8->valor) > 0)
                {
                    if($request->q8 == $questao8->correta)
                    {  
                        $nota+=$ponto_questao8->valor;
                    }
                }
                elseif(!count($ponto_questao8->valor) > 0 && $request->q8 == $questao8->correta)
                {
                    $nota+=1;
                }
            }   
        }

        if(isset($request->q9))
        {
            foreach ($ponto_questao9 as $ponto_questao9) {
                    # code...
                if(count($ponto_questao9->valor) > 0)
                {
                    if($request->q9 == $questao9->correta)
                    {  
                        $nota+=$ponto_questao9->valor;
                    }
                }
                elseif(!count($ponto_questao9->valor) > 0 && $request->q9 == $questao9->correta)
                {
                    $nota+=1;
                }
            }   
        }

        if(isset($request->q10))
        {
            foreach ($ponto_questao10 as $ponto_questao10) {
                    # code...
                if(count($ponto_questao10->valor) > 0)
                {
                    if($request->q10 == $questao10->correta)
                    {  
                        $nota+=$ponto_questao10->valor;
                    }
                }
                elseif(!count($ponto_questao10->valor) > 0 && $request->q10 == $questao10->correta)
                {
                    $nota+=1;
                }
            }   
        }
            
        break; 
        } ##FIM DO SWITCH CASE###

        $id = $request->aluno_id;
        $aluno = Aluno::find($id);
        $resultado->avaliacao()->associate($request->avaliacao_id);
        $resultado->aluno()->associate($request->aluno_id);
        $resultado->nota = $nota;
        if($resultado->save())
        {            
            $request->session()->flash('alert-success', 'Avaliação realizada com sucesso!!');
            return redirect('aluno');
        }


       
    }
}
