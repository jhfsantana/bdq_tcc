<?php

namespace App\Http\Controllers\Professores;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Professor;

use App\Models\Turma;

use App\Models\Disciplina;

use Hash;

use App\Http\Requests\Professor\ProfessorRequest;

use DateTime;

use App\Models\Util;

use Auth;

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
        $diames = Util::pegarDiaSemana();

        return view('professores.index')->with('alunos', $alunos)
            ->with('diames', $diames);
    }



    public function indexAPI($id = null)
    {
        if($id == null)
        {
            return Professor::orderBy('id', 'desc')->get();
        }
        else
        {
            return $this->show($id);
        }
/*        $professores = Professor::all();
        return view('professores.professores_lista')->with('professores', $professores);*/
    }

    public function index()
    {   $disciplinas = Disciplina::all();
        return view('professores.professores_lista')->with('disciplinas', $disciplinas);
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
    public function store(ProfessorRequest $request)
    {
      
       // $subjects = Subject::find($request->id);
       //dd($request);
        $professor = new Professor;
        //$subject = $request->subjects;
        $professor->matricula = $request->input('matricula');
        $professor->nome = $request->input('nome');
        $professor->sobrenome = $request->input('sobrenome');
        $professor->cpf = Util::somenteNumeros($request->input('cpf'));
        $professor->email = $request->input('email');
        
        $cryptPassword = bcrypt($request->input('password'));
        $professor->password = $cryptPassword;
        
       // $professor->subjects()->sync($request->subjects, false);
        
        $professor->save();
        $professor->disciplinas()->sync($request->input('disciplinas'), false);
        return 'salvou'.$professor->id;

        
        // $professor->classrooms()->sync($request->classrooms, false); ------ ATTACH PARA RELACIONAR TURMA COM PROFESSOR




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $professor = Professor::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $professor = Professor::find($id);
        //$subject = $request->subjects;
        $professor->matricula = $request->input('matricula');
        $professor->nome = $request->input('nome');
        $professor->sobrenome = $request->input('sobrenome');
        $professor->cpf = Util::somenteNumeros($request->input('cpf'));
        $professor->email = $request->input('email');
        
        $cryptPassword = bcrypt($request->input('password'));
        $professor->password = $cryptPassword;
        
       // $professor->subjects()->sync($request->subjects, false);
        $professor->save();
        $professor->disciplinas()->sync($request->input('disciplinas'), false);
        return 'alterou com sucesso'.$professor->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = Professor::find($id)->delete();

        return 'Professor deletado com sucesso!';

/*        return redirect('professores');
*/
    }
    public function logintela()
    {
        return view('professores.auth');
    }

    public function alunos()
    {
        $disciplina = Disciplina::with('professores')->find(Auth::user()->id);
        return view('professores.alunos')->with('disciplina', $disciplina);
    }

}
