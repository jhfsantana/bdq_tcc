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
use App\Models\Notificacao;

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

    public function indexAPI($id = null)
    {
        if($id == null)
        {
            return Aluno::orderBy('id', 'desc')->get();
        }
        else
        {
            return $this->show($id);
        }

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
        $aluno->cpf = \App\Models\Util::somenteNumeros($request->cpf);
        $aluno->email = $request->email;
        $cryptPassword = bcrypt($request->password);
        $aluno->password = $cryptPassword;
        $aluno->uf = $request->input('uf');
        $aluno->bairro = $request->input('bairro');
        $aluno->cidade = $request->input('cidade');
        $aluno->logradouro = $request->input('logradouro');
        $aluno->cep = $request->input('cep');
        $aluno->save();

        //$aluno->disciplinas()->sync($request->disciplinas, false);

        return 'salvou';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Aluno::find($id);
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
    public function update(Request $request, $id)
    {
        $aluno = Aluno::find($id);
        //$subject = $request->subjects;
        $aluno->matricula = $request->input('matricula');
        $aluno->nome = $request->input('nome');
        $aluno->sobrenome = $request->input('sobrenome');
        $aluno->cpf = \App\Models\Util::somenteNumeros($request->input('cpf'));
        $aluno->email = $request->input('email');
        
        $cryptPassword = bcrypt($request->input('password'));
        $aluno->password = $cryptPassword;
        
       // $professor->subjects()->sync($request->subjects, false);
        $aluno->save();
        $aluno->disciplinas()->sync($request->input('disciplinas'), false);
        return 'alterou com sucesso id = '.$aluno->id;


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
            return json_encode(['message' => 'Aluno '. $aluno->nome .' deletado com sucesso!']);
        }
        else
        {
            return json_encode(['message' => 'Error! Algo inesperado ocorreu!']);
        }
    }

    public function loginTela()
    {
        return view('alunos.auth');
    }

    public function bemvindo()
    {
        $usuario = Aluno::find(Auth::user()->id);
        $ultimaNota = Aluno::ultimaNota();

        $disciplinas = Aluno::find(Auth::user()->id)->disciplinas;
        $turmas = Aluno::find(Auth::user()->id)->turmas;
        $notificacoes = Notificacao::all()->where('aluno_id', Auth::user()->id)->where('avaliacao_id', '=', 0);
        
        $media = Aluno::mediaAluno(Auth::user()->id);
        $contador_notificacoes = Notificacao::all()
                                                ->where('visualizado', '<>', 1)
                                                ->where('aluno_id', Auth::user()->id)
                                                ->where('avaliacao_id', '=', 0);
                                            
        $diames = \App\Models\Util::pegarDiaSemana();
        return view('alunos.index')->with('aluno', $ultimaNota)
                                    ->with('notificacoes', $notificacoes)
                                    ->with('contador_notificacoes', count($contador_notificacoes))
                                    ->with('turmas', count($turmas))
                                    ->with('disciplinas', count($disciplinas))
                                    ->with('diames', $diames)
                                    ->with('media', $media);
    }

    public function avaliacao(Request $request)
    {
        $avaliacao = Turma::with('avaliacoes')->find($request->turma_id)->avaliacoes->where('disciplina_id', '=', $request->disciplina_id)->where('id', '=', $request->avaliacao_id);
/*        $avaliacao = Avaliacao::find($request->avaliacao_id);*/

       // $avaliacao = Turma::with('avaliacoes')->find($request->turma_id)->avaliacoes;


        return view('alunos.avaliacao')->with('avaliacao', $avaliacao);
    }
    
    
    public function avaliacoesDisponiveis()
    {
        $aluno = Aluno::find(Auth::user()->id);
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
            Notificacao::dispararNotificacao($request->avaliacao_id, $avaliacao->professor_id, $request->aluno_id, 'O aluno '. $aluno->nome .' realizou a avaliação da disciplina ' . $avaliacao->disciplina->nome);            
            $request->session()->flash('alert-success', 'Avaliação realizada com sucesso!!');
            return redirect('aluno');
        }


       
    }

    public function config($id)
    {
        $a_id = Aluno::find($id);
        $disciplinas = Disciplina::all();
        $turmas = Turma::all();

        return vieW('alunos.config')->with('aluno', $a_id)
                                         ->with('disciplinas', $disciplinas)
                                         ->with('turmas', $turmas);
    }

    public function configSave(Request $request)
    {
        $aluno = Aluno::find($request->aluno_id);
        
        $disciplina = Disciplina::find($request->disciplina);
        $turma = Turma::find($request->turma);
        $disciplinaArray[] = $request->disciplina;
        $turmaArray[] = $request->turma;
        $profArray[] = $request->aluno_id;


        // foreach ($aluno->disciplinas as $disciplina) 
        // {
        //     if($disciplina->id == $request->disciplina)
        //     {
        //         if($disciplina->turmas)
        //         {
        //             $request->session()->flash('alert-danger', 'Não é possivel realizar esta operação! O aluno não pode ter uma mesma disciplina em várias turmas!');
        //             return redirect()->back();
        //         }
        //     }
        // }

        $nome = $aluno->nome;
        
        if($aluno->save())
        {
            if($disciplina->save())
            {   
                $aluno->disciplinas()->sync($disciplinaArray, false);
                $aluno->turmas()->sync($turmaArray, false);
                $disciplina->turmas()->sync($turmaArray, false);
                $turma->professores()->sync($profArray, false);
                $request->session()->flash('alert-success', 'Configuração para o aluno '. $nome.' realizada com sucesso!');

                return redirect()->back();
            }
        }
    }

    public function limparConfig(Request $request)
    {
        $result2 = DB::delete('DELETE FROM aluno_turma WHERE aluno_id = ? AND turma_id = ? LIMIT 1',[$request->aluno_id, $request->turma_id]);
        $result3 = DB::delete('DELETE FROM disciplina_turma WHERE disciplina_id = ? AND turma_id = ? LIMIT 1',[$request->disciplina_id, $request->turma_id]);

        return redirect()->back();
    }
}
