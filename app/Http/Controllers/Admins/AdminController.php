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
use Charts;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
	

    public function index()
    {        
        $professores = Professor::professorComMaiorNumeroDeQuestoes();
        $total = Professor::totalProfessores();
        $alunos = ALuno::totalAlunos();
                       
        $chart = Charts::database(Professor::professorComMaiorNumeroDeQuestoes(), 'bar', 'highcharts')
            ->setTitle('Quantidade de questões adicionadas ao BDQ')
            ->setElementLabel("Total de questões")
            ->setDimensions(1280, 500)
            ->setResponsive(false)
            ->groupBy('nome');

                

        return view ('admin.index')->with('professores', $total)
                                   ->with('alunos', $alunos)
                                   ->with('chart', $chart)
                                   ->with('top', $professores);
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
    
    public function relatorioQuestao($limite)  
    {   
        $qtdQuestao = Questao::topQuestoes($limite);


        return view('admin.relatorio_qtd_questao_av')
                    ->with('qtdQuestao', $qtdQuestao);
    }    

}
