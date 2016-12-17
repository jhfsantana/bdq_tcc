<?php

namespace App\Http\Controllers\Disciplinas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Disciplina;
use App\Models\Professor;
use App\Models\Turma;
use App\Http\Requests\Disciplina\DisciplinaRequest;


class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $disciplinas = Disciplina::all();
        return view('disciplinas.disciplinas_lista')->with('disciplinas', $disciplinas);
    }
    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turmas = Turma::all();
        return view('disciplinas.formulario_disciplina')->with('turmas', $turmas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {

        $disciplina = $request->nome;
        $turma = $request->turmas;
        
        $turmaDisponivel = Disciplina::checarTurmaDisponivel($disciplina, $turma);
        
        if(count($turmaDisponivel) > 0)
        {
            $request->session()->flash('alert-danger', 'Disciplina já associada a esta turma');
            return redirect()->back();

        }


        $disciplina = new Disciplina;
       
        //$subject = $request->subjects;
        $disciplina->nome = $request->nome;
    
       // $teacher->subjects()->sync($request->subjects, false);
        $disciplina->save();

        $disciplina -> turmas()->sync($request->turmas, false);

        if($disciplina->save())
        {
            $request->session()->flash('alert-success', 'Disciplina cadastrada com sucesso');
            return redirect ('/disciplinas');
        }
        //$teacher->subjects()->attach($request->subjects);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
