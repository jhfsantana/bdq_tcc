<?php

namespace App\Http\Controllers\Turmas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Turma;
use App\Models\Disciplina;
use App\Http\Requests\Turma\TurmaRequest;
use Illuminate\Support\Facades\DB;


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

        if($turma->save())
        {
            return json_encode(['success' => 'Cadastrada com sucesso!']);
        }
        else
        {
            return json_encode(['error' => 'Algo inesperado aconeceu!']);
        }
        ///$turma->disciplinas()->sync($request->disciplinas, false);
        
        
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
        $html = '<ul>';
        $turma = Turma::find($id);
        $check = DB::table('turmas')->join('disciplina_turma', 'turmas.id', '=', 'disciplina_turma.turma_id')
                                    ->join('disciplinas', 'disciplina_turma.disciplina_id', '=', 'disciplinas.id')
                                    ->where('turmas.id', '=', $id)
                                    ->get();

        if (count($check) > 0)
        {
            foreach ($check as $turma) {
                $html .= '<li>'.$turma->nome.'</li>';
            }

            $html .= '</ul>';
            return json_encode(['error' => 'Error! Esta turma possui disciplinas associadas, não é possivel continuar com a operação! '. $html]);
        }
        else 
        {
            if($turma->delete())
            {
                return json_encode(['message' => 'Turma removida com sucesso!']);
            }
        }
       
    }
}
