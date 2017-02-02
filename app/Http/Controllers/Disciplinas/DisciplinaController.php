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
        $turmas = Turma::all();
        return view('disciplinas.disciplinas_lista')->with('turmas', $turmas)->with('disciplinas', $disciplinas);
    }

    public function indexAPI($id = null)
    {
        if($id != null)
        {
            return Disciplina::all();
        }
        else
        {
            return $this->show($id);
        }

    }


    public function create()
    {
        $disciplinas = Disciplina::all();
        return view('disciplinas.formulario_disciplina')->with('turmas', $turmas)->with('disciplinas', $disciplinas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {   
        $turmaDisponivel = Disciplina::checarTurmaDisponivel($request->nome, $request->turmas);
        
        if(count($turmaDisponivel) > 0)
        {
            $request->session()->flash('alert-danger', 'Disciplina já associada a esta turma');
            return redirect()->back();

        }
        else
        {
            $disciplina = new Disciplina;
            $disciplina->nome = $request->nome;
            if($disciplina->save())
            {
                $disciplina->turmas()->sync($request->turmas, false);
                $request->session()->flash('alert-success', 'Disciplina cadastrada com sucesso');
                return redirect ('/disciplinas');
            }
        }
    }

    public function show($id)
    {
        return Disciplina::find($id);
    }

    public function update(Request $request, $id)
    {
        $turmaDisponivel = Disciplina::checarTurmaDisponivel($request->nome, $request->turmas);
        
        if(count($turmaDisponivel) > 0)
        {
            $request->session()->flash('alert-danger', 'Disciplina já associada a esta turma');
            return redirect()->back();

        }
        else
        {
            $disciplina = Disciplina::find($id);
            $disciplina->nome = $request->nome;
            if($disciplina->save())
            {
                $disciplina->turmas()->sync($request->turmas, false);
                $request->session()->flash('alert-success', 'Disciplina cadastrada com sucesso');
                return redirect ('/disciplinas');
            }
        }

    }

    public function destroy($id)
    {
        Disciplina::find($id)->delete();
    }
}
