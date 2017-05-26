<?php

namespace App\Http\Controllers\Turmas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Turma;
use App\Models\Disciplina;
use App\Http\Requests\Turma\TurmaRequest;


class TurmaController extends Controller
{
    public function index()
    {
        return view('turmas.formulario_turma');
    }

    public function indexAPI($id = null)
    {
        if($id == null)
        {
            return Turma::orderBy('id', 'desc')->get();
        }
        else
        {
            return $this->show($id);
        }
    }

    public function create()
    {
        $turmas = Turma::all();
        return view('turmas.formulario_turma')->with('turmas', $turmas);
    }

    public function store(TurmaRequest $request)
    {
        $turma = new Turma();
        $turma->nome = $request->nome;
        $turma->save();
        $turma->disciplinas()->sync($request->disciplinas, false);
        return 'turma criada';
        
    }

    public function show($id)
    {
        return Turma::find($id);
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::find($id);
        $turma->nome = $request->nome;
        $turma->save();
        $turma->disciplinas()->sync($request->disciplinas, false);

        return 'turma alterada id = '.$id;
    }
    
    public function destroy($id)
    {
       Turma::find($id)->delete();

       return 'Turma ' . $id .' deletada';
    }
}
