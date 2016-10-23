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

use Illuminate\Support\Facades\Input;

use App\Http\Requests\FormRequest;

use DB;

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
    public function store(Request $request)
    {
        $aluno = new Aluno();

        $aluno->matricula = $request->matricula;
        $aluno->nome = $request->nome;
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
    public function edit($id)
    {
        //
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
        //
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
        $aluno->delete();

        return redirect('alunos');
    }

    public function loginTela()
    {
        return view('alunos.auth');
    }

    public function bemvindo()
    {
        return view('alunos.index');
    }

    public function avaliacao($id)
    {
        $avaliacao = Turma::with('avaliacoes')->find($id)->avaliacoes;

        return view('alunos.avaliacao')->with('avaliacao', $avaliacao);
    }
    
    
    public function avaliacoesDisponiveis($id)
    {
        $aluno = Aluno::find($id);
        return view('alunos.avaliacao_disponivel')->withAluno($aluno);
    }

    public function correcao(Request $request)
    {
        $nota = 0;
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

        
        if(isset($request->q1))
        {
            if($request->q1 == $questao1->correta)
            {
                ++$nota;    
            }
            
        }

        if(isset($request->q2))
        {
            if($request->q2 == $questao2->correta)
            {
                ++$nota;    
            }
            
        }

        if(isset($request->q3))
        {
            if($request->q3 == $questao3->correta)
            {
                ++$nota;    
            }
            
        }

        if(isset($request->q4))
        {
            if($request->q4 == $questao4->correta)
            {
                ++$nota;    
            }
            
        }

        if(isset($request->q5))
        {
            if($request->q5 == $questao5->correta)
            {
                ++$nota;    
            }
            
        }

        if(isset($request->q6))
        {
            if($request->q6 == $questao6->correta)
            {
                ++$nota;    
            }
            
        }

        if(isset($request->q7))
        {
            if($request->q7 == $questao7->correta)
            {
                ++$nota;    
            }
            
        }

        if(isset($request->q8))
        {
            if($request->q8 == $questao8->correta)
            {
                ++$nota;    
            }
            
        }
        
        if(isset($request->q9))
        {
            if($request->q9 == $questao9->correta)
            {
                ++$nota;    
            }
            
        }

        if(isset($request->q10))
        {
            if($request->q10 == $questao10->correta)
            {
                ++$nota;    
            }
            
        }


        return view('alunos.resultado')->with('nota', $nota);
    }
}
