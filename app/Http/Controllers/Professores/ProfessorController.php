<?php

namespace App\Http\Controllers\Professores;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Professor;

use App\Models\Turma;

use App\Models\Disciplina;
use Hash;
use App\Http\Requests\FormRequest;
use DateTime;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function bemvindo()
    {
        $alunos = Professor::meusAlunos();
        return view('professores.index')->with('alunos', $alunos);
    }



    public function index()
    {
        $professores = Professor::all();
        return view('professores.professores_lista')->with('professores', $professores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas = Disciplina::all();
        $turmas = Turma::all();
        $matriculas = Professor::all();

        return view('professores.formulario_professor')->with('disciplinas', $disciplinas)->with('turmas', $turmas)->with('matriculas', $matriculas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       // $subjects = Subject::find($request->id);
       //dd($request);
        $professor = new Professor;
       
        //$subject = $request->subjects;
        $professor->matricula = $request->matricula;
        $professor->nome = $request->nome;
        $professor->email = $request->email;
        
        $cryptPassword = bcrypt($request->password);
        $professor->password = $cryptPassword;
        
       // $professor->subjects()->sync($request->subjects, false);
        $professor->save();

        $professor->disciplinas()->sync($request->disciplinas, false);
        
        // $professor->classrooms()->sync($request->classrooms, false); ------ ATTACH PARA RELACIONAR TURMA COM PROFESSOR




        return redirect ('professores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = Professor::find($id);

       #TO-DO RELACIONAR PROFESSOR COM TURMA PARA CORRIGIR BUG DO PROFESSOR EM TODAS AS TURMAS.

        return view('professores.detalhes')->withProfessor($professor);   
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
     * Update the specified resource in storage.r
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
        $professor = Professor::find($id);
        $professor->delete();

        return redirect('professores');

    }
    public function logintela()
    {
        return view('professores.auth');
    }

}
