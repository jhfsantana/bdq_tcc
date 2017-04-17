<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Professor;
use App\Models\Disciplina;
use App\Models\Aluno;
use App\Models\Questao;
use App\Models\Avaliacao;
use App\Models\Util;
use Charts;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use Response;

class AdminController extends Controller
{
	

    public function index()
    {        
        $professores = Professor::professorComMaiorNumeroDeQuestoes();
        $professore2s = Professor::professorTopQuestoes();
        $questoes = Questao::topQuestoes();
        $media = Avaliacao::mediaAvaliacao();
        
        $todos = Professor::all();
      
        $total = Professor::totalProfessores();
        $alunos = ALuno::totalAlunos();
        $diames = Util::pegarDiaSemana();
                       
        $chart[] = Charts::database(Professor::professorComMaiorNumeroDeQuestoes(), 'bar', 'highcharts')
            ->setTitle('Quantidade de questões adicionadas ao BDQ')
            ->setElementLabel("Total de questões")
            ->setDimensions(425, 250)
            ->setResponsive(true)
            ->groupBy('nome');
/*
        $chart[] = Charts::database(Professor::professorComMaiorNumeroDeQuestoes(), 'pie', 'highcharts')
                    ->setTitle('Quantidade de questões adicionadas ao BDQ')
                    ->setElementLabel("Total de questões")
                    ->setDimensions(500, 250)
                    ->setResponsive(true)
                    ->groupBy('nome');*/

        $realtime = Charts::realtime(route('media'), 1000, 'gauge', 'google')
                    ->setTitle('Média das notas dos alunos')
                    ->setValues([0, 0, 10])
                    ->setResponsive(false);
;

        $chartPizza = Charts::database(Questao::topQuestoes(), 'pie', 'highcharts')
                    ->setTitle('Questões mais utilizadas em Avaliações')
                    ->setElementLabel("Total de questões")
                    ->groupBy('questao_id', 'created_at');
        
        return view ('admin.index')->with('professores', $total)
                                   ->with('alunos', $alunos)
                                   ->with('chart', $chart)
                                   ->with('top', $professores)
                                   ->with('realtime', $realtime)
                                   ->with('chartPizza', $chartPizza)
                                   ->with('diames', $diames)
                                   ->with('todos',  $todos);
    }

    public function indexAPI($id = null)
    {
        if($id == null)
        {
            return Admin::orderBy('id', 'desc')->get();
        }
        else
        {
            return $this->show($id);
        }
    }

    public function validarDados($dado, $id = null)
    {  

        // $emailValidado = Admin::where('email', $dado)->Where('id', '<>', $id)->get();
        // $matriculaValidado = Admin::where('matricula', $dado)->Where('id', '<>', $id)->get();
        // $cpfValidado = Admin::where('cpf', $dado)->Where('id', '<>', $id)->get();
        
        // if(count($emailValidado) || count($matriculaValidado) || count($cpfValidado))
        // {
        //     return $matriculaValidado;
        // }
        // elseif (!count($emailValidado) || !count($matriculaValidado) || !count($cpfValidado)) 
        // {
        //     $emailValidado = Professor::where('email', $dado)->Where('id', '<>', $id)->get();
        //     $matriculaValidado = Professor::where('matricula', $dado)->Where('id', '<>', $id)->get();
        //     $cpfValidado = Professor::where('cpf', $dado)->Where('id', '<>', $id)->get();

        //     if(count($emailValidado) || count($matriculaValidado) || count($cpfValidado))
        //     {
        //         return json_encode(true);
        //     }
        //     elseif (!count($emailValidado) || !count($matriculaValidado) || !count($cpfValidado))
        //     {
        //         $emailValidado = Aluno::where('email', $dado)->Where('id', '<>', $id)->get();
        //         $matriculaValidado = Aluno::where('matricula', $dado)->Where('id', '<>', $id)->get();
        //         $cpfValidado = Aluno::where('cpf', $dado)->Where('id', '<>', $id)->get();

        //         if(count($emailValidado) || count($matriculaValidado) || count($cpfValidado))
        //         {
        //             return json_encode(true);
        //         }
        //     }

        // }
                $emailValidado = Aluno::where('email', $dado)->Where('id', '<>', $id)->get();
                $matriculaValidado = Aluno::where('matricula', $dado)->Where('id', '<>', $id)->get();
                $cpfValidado = Aluno::where('cpf', $dado)->Where('id', '<>', $id)->get();

                if(count($emailValidado) || count($matriculaValidado) || count($cpfValidado))
                {
                    return json_encode(true);
                }
    }

    public function show($id)
    {
        return Admin::find($id);
    }
    
    public function loginTela()
    {
        return view('admin.auth');
    }

    public function create()
    {
        return view('admin.register');
    }

    public function store(AdminRequest $request)
    {
       
        $admin = new Admin;
        $admin->matricula = $request->input('matricula');
        $admin->name = $request->input('name');
        $admin->sobrenome = $request->input('sobrenome');
        
        if(!Admin::validarCPF($request->input('cpf')))
        {
            $admin->cpf = Util::somenteNumeros($request->input('cpf'));
        }
        else
        {
            $request->session()->flash('alert-danger', 'CPF JÁ EXISTENTE!');
            return redirect('/administradores');
        }

        if(!Admin::validarEmail($request->input('email')))
        {
            $admin->email = $request->input('email');

        }
        else
        {
            $request->session()->flash('alert-danger', 'EMAIL JÁ EXISTENTE!');
            return redirect('/administradores');
        }
        
        $cryptPassword = bcrypt($request->input('password'));
        $admin->password = $cryptPassword;
        
       // $professor->subjects()->sync($request->subjects, false);
        $this->getToken();
        $admin->save();
        return 'salvou';

    }

    public function update(AdminRequest $request, $id)
    {
        $admin = Admin::find($id);
        //$subject = $request->subjects;
        $admin->matricula = $request->input('matricula');
        $admin->name = $request->input('name');
        $admin->sobrenome = $request->input('sobrenome');
        $admin->cpf = Util::somenteNumeros($request->input('cpf'));
        $admin->email = $request->input('email');
        
        $cryptPassword = bcrypt($request->input('password'));
        $admin->password = $cryptPassword;
        
       // $professor->subjects()->sync($request->subjects, false);
        
        $admin ->save();
        return 'alterou';


    }

    public function destroy($id)
    {
        return Admin::find($id)->delete();
    }

    public function relatorio()  
    {   
        $disciplinas = Disciplina::all();
        $data = '2016-10-30';
        $professores = Professor::professorTopQuestoes();

        return view('admin.relatorio_qtd_prof_questao')
                    ->with('disciplinas', $disciplinas)
                    ->with('professores_top_questao', $professores);
    }

    public function relatorioNotas($id)  
    {   
        $disciplinas = Disciplina::all();
        $data = '2016-10-30';
        $notas = Professor::notas($data, $id);

        return view('admin.relatorio_nota_disciplina')
                    ->with('notas', $notas)
                    ->with('disciplinas', $disciplinas);
    }
    
    public function relatorioQuestao()  
    {   
        $qtdQuestao = Questao::topQuestoes();


        return view('admin.relatorio_qtd_questao_av')
                    ->with('qtdQuestao', $qtdQuestao);
    }

    public function lista()
    {
        return view('admin.admin_lista');
    }
    public function getToken()
    {
        return Response::json(['token'=>csrf_token()]);
    }
}
