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
        if($id == null)
        {
            return Disciplina::orderBy('id', 'desc')->get();
        }
        else
        {
            return $this->show($id);
        }
    }
    
    public function show($id)
    {
        return Disciplina::find($id);
    }

    public function create()
    {
        $disciplinas = Disciplina::all();
        return view('disciplinas.formulario_disciplina')->with('turmas', $turmas)->with('disciplinas', $disciplinas);
    }


    public function store(DisciplinaRequest $request)
    {   
        $resultado = $this->validarDisciplinaNaTurma($request->nome, $request->turmas);

        if($resultado)
        {
            return json_encode([
                   'message' => 'Disciplina já cadastrada para esta turma',
                   'error' => 'ME-30' 
                   ]);
        }
        else
        {
            $disciplina = new Disciplina;
            $disciplina->nome = $request->nome;
            if($disciplina->save())
            {
                if(isset($request->professores))
                {
                    $disciplina->professores()->sync($request->professores, false);                
                }

                return json_encode([
                   'message' => 'Disciplina cadastrada com sucesso!',
                   'success' => 'MS-30' 
                   ]);
            }
        }
    }

    public function update(DisciplinaRequest $request, $id)
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
                if(isset($request->professores))
                {
                    $disciplina->professores()->sync($request->professores, false);                
                }                
                $request->session()->flash('alert-success', 'Disciplina alterada com sucesso');
                return redirect ('/disciplinas');
            }
        }

    }

    public function destroy($id)
    {
        $disciplina = Disciplina::find($id);
        $check = DB::table('disciplinas')->join('disciplina_professor', 'disciplinas.id', '=', 'disciplina_professor.disciplina_id')
                                    ->join('professores', 'disciplina_professor.professor_id', '=', 'professores.id')
                                    ->where('disciplinas.id', '=', $id)
                                    ->get();
        $check2 = DB::table('disciplinas')->join('aluno_disciplina', 'disciplinas.id', '=', 'aluno_disciplina.disciplina_id')
                                    ->join('alunos', 'aluno_disciplina.aluno_id', '=', 'alunos.id')
                                    ->where('disciplinas.id', '=', $id)
                                    ->get();
        $html = '<ul>';

        if (count($check) > 0)
        {
            foreach ($check as $professor) {
                $html .= '<li> Professor:'.$professor->nome.'</li>';
            }

            $html .= '</ul>';            

            return json_encode(['error' => 'Error! Esta disciplina possui turmas/professores associadas, não é possivel continuar com a operação! '. $html]);  

        }
        else if(count($check2) > 0)
        {

            foreach ($check2 as $aluno) {
                $html .= '<li> Aluno:'.$aluno->nome.'</li>';
            }

            $html .= '</ul>';
            return json_encode(['error' => 'Error! Esta disciplina possui alunos associados, não é possivel continuar com a operação! '. $html]);        
        }
        else
        {
            return json_encode(['message' => 'Disciplina '. $disciplina->nome .' removida com sucesso!']);
        }
        // if($disciplina->delete())
        // {
        //     return json_encode(['message' => 'Disciplina '. $disciplina->nome .' removida com sucesso!']);
        // }
        // else
        // {
        //     return json_encode(['error' => 'Error! Algo inesperado occorreu!']);   
        // }
    }

    public function validarDisciplinaNaTurma($nome, $turma)
    {
        $turmaDisponivel = Disciplina::checarTurmaDisponivel($nome, $turma);
        
        if(count($turmaDisponivel) > 0)
        {
            return true;
        }
    }

    public function DisciplinaByProfessor()
    {
        return Professor::with('disciplinas')->find(\Auth::user()->id)->disciplinas;
        // return DB::select('select * from disciplinas where professor_id = ?', array(Auth::user()->id));
    }

    public function config($id)
    {   
        /*
        $avaliacao = Turma::with('avaliacoes')->find($request->turma_id)->avaliacoes->where('disciplina_id', '=', $request->disciplina_id)->where('id', '=', $request->avaliacao_id);*/

        $d_id = Disciplina::find($id);
        return vieW('disciplinas.config')->with('disciplina', $d_id);
    }

    public function removerProfessor(Request $request)
    {        
        $validar = Disciplina::validarRemocao($request->professor_id, $request->disciplina_id);
        $foundTurma = array(); 
        $count = 0;
        
        foreach ($validar as $turma) 
        {
           if($turma->nome)
           {
                $count++;
                $foundTurma[] = $turma->nome; 
           }
        }
        
        if(!empty($foundTurma))
        {
            $request->session()->flash('alert-danger', 'ERROR! Esta disciplina, possui '.$count. ' turma(s) associada(s) a este professor.');
            return redirect()->back();
        }
        

        $result = DB::delete('DELETE FROM disciplina_professor WHERE professor_id = ? AND disciplina_id = ? LIMIT 1',[$request->professor_id, $request->disciplina_id]);

        return redirect()->back();
    }
}
