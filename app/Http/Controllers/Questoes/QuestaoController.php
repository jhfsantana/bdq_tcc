<?php

namespace App\Http\Controllers\Questoes;

use Illuminate\Http\Request;

use App\Http\Requests\Questao\QuestaoRequest;
use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\Questao;
use App\Models\Disciplina;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;



class QuestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $questoes = Professor::with('questoes')
                    ->find($id)->questoes;
        return view('questoes.questao_lista')
                    ->with('questoes', $questoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $professor = Professor::find($id);
        return view('questoes.formulario_questao')->withProfessor($professor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $questao = new Questao();

        $questao->questao = $request->questao;
        $questao->alternativaA = $request->a;
        $questao->alternativaB = $request->b;
        $questao->alternativaC = $request->c;
        $questao->alternativaD = $request->d;
        $questao->alternativaE = $request->e;
        $questao->correta = $request->correta;
        $questao->nivel = $request->nivel;
        
        if(isset($request->professor_id))
        {
            $questao->professor()->associate($request->professor_id);
        }

        if(isset($request->admin_id))
        {
            $questao->professor()->associate($request->professor_id);
        }


        $questao->disciplina()->associate($request->disciplina);

        if($questao->save())
        {
            $request->session()->flash('alert-success', 'Questão salva com sucesso!');
            return redirect ('professor');
        }
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
    public function edit(Request $request)
    {

        $questao_id = $request->id;
        $questao = Questao::find($questao_id);
        $professor_id = $request->professor_id;

        $professor = Professor::find($professor_id);


        if(Auth::guard('web_admins'))
        {
            $disciplinas = Disciplina::all();
            return view('questoes.questao_alterar')->withQuestao($questao)->with('professor', $professor)->with('disciplinas', $disciplinas);
        }
        else
        {
            return view('questoes.questao_alterar')->withQuestao($questao)->with('professor', $professor);
        }
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

        $alterado = Questao::find($request->questao_id);

        $alterado->questao = $request->questao;

        $alterado->alternativaA = $request->a;

        $alterado->alternativaB = $request->b;

        $alterado->alternativaC = $request->c;

        $alterado->alternativaD = $request->d;

        $alterado->alternativaE = $request->e;

        $alterado->correta = $request->correta;
        $alterado->nivel = $request->nivel;

        $alterado->disciplina()->associate($request->disciplina);

        
        if(Auth::guard('web_admins'))
        {
            if($alterado->save())
            {
                $request->session()->flash('alert-success', 'Questão alterada com sucesso!');
                return redirect ('/home');
            }
        }
        else
        {
            if($alterado->save())
            {
                $request->session()->flash('alert-success', 'Questão alterada com sucesso!');
                return redirect ('/professor');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deletar(Request $request)
    {
        $questao = Questao::find($request->questao_id);
        $questao->delete();
        $request->session()->flash('alert-danger', 'Questão '. $questao->questao .' deletada com sucesso!');

        if(Auth::guard('web_admins'))
        {
            return redirect ('/home');   
        }
        else
        {
            return redirect ('professor');   
        }
    }
    public function buscarQuestao()
    {
        
        /*$questao = Questao::find($disciplina_id);
        $questao = Questao::orderByRaw('RAND()')->take(1)->where($disciplina_id)->get();*/
    }

    public function adminFormQuestao()
    {
        $disciplinas = Disciplina::all();
        return view('questoes.formulario_questao_admin')->with('disciplinas', $disciplinas);
    }

    public function adminQuestaoSalvar(QuestaoRequest $request)
    {

        $questao = new Questao();

        $questao->questao = $request->questao;
        $questao->alternativaA = $request->a;
        $questao->alternativaB = $request->b;
        $questao->alternativaC = $request->c;
        $questao->alternativaD = $request->d;
        $questao->alternativaE = $request->e;
        $questao->correta = $request->correta;
        $questao->nivel = $request->nivel;


        if(isset($request->admin_id))
        {
            $questao->admin()->associate($request->admin_id);
        }


        $questao->disciplina()->associate($request->disciplina);

        if($questao->save())
        {
            $request->session()->flash('alert-success', 'Questão salva com sucesso!');
            return redirect ('/home');
        }
    }

    public function listaTotalQuestoes()
    {
        $questoes = Questao::all();

        return view('questoes.questao_lista_admin')->with('questoes', $questoes);
    }
}
