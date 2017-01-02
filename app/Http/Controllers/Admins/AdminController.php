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
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
	

    public function index()
    {        
        $professores = Professor::professorComMaiorNumeroDeQuestoes();
        $professore2s = Professor::professorTopQuestoes();
        $questoes = Questao::topQuestoes();
        $media = Avaliacao::mediaAvaliacao();
           
      
        $total = Professor::totalProfessores();
        $alunos = ALuno::totalAlunos();
        $diames = Util::pegarDiaSemana();
                       
        $chart[] = Charts::database(Professor::professorComMaiorNumeroDeQuestoes(), 'bar', 'highcharts')
            ->setTitle('Quantidade de questões adicionadas ao BDQ')
            ->setElementLabel("Total de questões")
            ->setDimensions(500, 250)
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
                    ->setlabels(['Third'])
                    ->setValues([0, 0, 10])
                    ->setResponsive(false);
;
/*
        $chart[] = Charts::database(Questao::topQuestoes(), 'pie', 'highcharts')
                    ->setTitle('Questões mais utilizadas em Avaliações')
                    ->setElementLabel("Total de questões")
                    ->groupBy('questao_id', 'created_at');*/
        
        return view ('admin.index')->with('professores', $total)
                                   ->with('alunos', $alunos)
                                   ->with('chart', $chart)
                                   ->with('top', $professores)
                                   ->with('diames', $diames)
                                   ->with('realtime', $realtime);
    }


    public function create()
    {
        return view('admin.register');
    }

    public function store(AdminRequest $request)
    {
    	$admin = new Admin;
    	$admin->name = $request->name;
        $admin->sobrenome = $request->sobrenome;
        $admin->cpf = Util::somenteNumeros($request->cpf);
    	$admin->email = $request->email;

    	$cryptPassword = bcrypt($request->password);
    	$admin->password = $cryptPassword;

    	if($admin ->save())
        {
            $request->session()->flash('alert-success', 'Administrador salvo com sucesso!');
            return redirect('/home');
        }

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

}
