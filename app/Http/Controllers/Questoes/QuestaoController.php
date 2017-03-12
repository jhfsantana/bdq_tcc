<?php

namespace App\Http\Controllers\Questoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Disciplina;
use App\Models\Professor;
use App\Models\Questao;
use App\Http\Requests\Questao\QuestaoRequest;
use Auth;

    


class QuestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questoes = Professor::with('questoes')
                    ->find(Auth::user()->id)->questoes;
        return view('questoes.questao_lista')
                    ->with('questoes', $questoes);
    }

    public function indexAPI($id = null)
    {
        if($id == null)
        {
            return Questao::orderBy('id', 'desc')->get();
        }else
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
        $professor = Professor::find(Auth::user()->id);
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
        
        $this->validate($request, 
            [
                'disciplina_id' => 'required|max:255',
                'nivel'         => 'required',
            ],
            $messages = 
                [
                    'disciplina_id.required' => 'Escolha uma disciplina',
                    'nivel.required'         => 'Nivel de dificuldade é obrigatório',
                ]);
        $questao = new Questao();
        $questao->questao         = $request->questao;
        $questao->alternativaA    = $request->alternativaA;
        $questao->alternativaB    = $request->alternativaB;
        $questao->alternativaC    = $request->alternativaC;
        $questao->alternativaD    = $request->alternativaD;
        $questao->alternativaE    = $request->alternativaE;
        $questao->correta         = $request->correta;
        $questao->nivel           = $request->nivel;
        
        if(\Auth::guard() == 'web_admins')
        {
            $questao->admin()->associate(Auth::guard('web_admins')->user()->id);
        }
        
        if(\Auth::guard() == 'web_teachers')
        {
            $questao->professor()->associate(Auth::guard('web_teachers')->user()->id);
        }

        $questao->disciplina()->associate($request->disciplina_id);

        if($questao->save())
        {
            if($request->trace == 'web')
            {
                $request->session()->flash('alert-success', 'questão adicionada com sucesso!');
                return redirect('/professor');
            }
            else
            {
                return json_encode([
                    'message' => 'Questão com ID '. $questao->id .' cadastrada com sucesso!',
                    'success' => 'success' 
                ]);
            }
        }
    }

    public function show($id)
    {
        return Questao::find($id);
    }


    public function update(Request $request, $id)
    {
        
        $questao = Questao::find($id);

        $questao->questao = $request->questao;
        $questao->disciplina_nome = $request->disciplina_nome;
        $questao->alternativaA = $request->alternativaA;
        $questao->alternativaB = $request->alternativaB;
        $questao->alternativaC = $request->alternativaC;
        $questao->alternativaD = $request->alternativaD;
        $questao->alternativaE = $request->alternativaE;
        $questao->correta = $request->correta;
        $questao->nivel = $request->nivel;
        
        if(Auth::guard('web_admins'))
        {
            $questao->admin()->associate(Auth::guard('web_admins')->user()->id);
        }
        elseif(Auth::guard('web_teachers'))
        {
            $questao->professor()->associate(Auth::guard('web_teachers')->user()->id);
        }

        $questao->disciplina()->associate($request->disciplina);

        if($questao->save())
        {
            return json_encode([
                'message' => 'Questão com ID '. $questao->id .' alterada com sucesso!',
                'success' => 'success' 
            ]);
        }
    }

    public function destroy($id)
    {
        Questao::find($id)->delete();
    }

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
        $questao->disciplina_nome = $request->disciplina_nome;
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

    public function messages()
    {
        return [
        ];
    }

    public function getQuestaoByProfessor()
    {
        return DB::select('select * from questoes where professor_id = ?', array(Auth::user()->id));
    }
}
