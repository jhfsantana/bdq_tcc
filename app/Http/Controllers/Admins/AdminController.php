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
        
        foreach($professores as $profs){
               
        $chart = Charts::create('pie', 'highcharts')
                ->setTitle('Estatísticas')
                ->setLabels(['nome', $profs->nome])
                ->setValues([$profs->total_questoes])
                ->setDimensions(1000,500)
                ->setResponsive(true); 

        }
        

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
        $admin->cpf = $request->cpf;
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
        $resultado = Professor::professorComMaiorNumeroDeQuestoes();
        $qtdQuestao = Questao::topQuestoes();

        return view('admin.relatorio_qtd_prof_questao')
                    ->with('professores_top_questao', $resultado)
                    ->with('disciplinas', $disciplinas)
                    ->with('qtdQuestao', $qtdQuestao);
    }

    public function relatorioNotas($id)  
    {   
        $disciplinas = Disciplina::all();
        $data = '2016-10-30';
        $resultado = Professor::professorComMaiorNumeroDeQuestoes();
        $notas = Professor::notas($data, $id);
        $qtdQuestao = Questao::topQuestoes();

        return view('admin.relatorio_nota_disciplina')
                    ->with('professores_top_questao', $resultado)
                    ->with('notas', $notas)
                    ->with('disciplinas', $disciplinas)
                    ->with('qtdQuestao', $qtdQuestao);
    }
    
    public function relatorioQuestao()  
    {   
        $disciplinas = Disciplina::all();
        $data = '2016-10-30';
        $resultado = Professor::professorComMaiorNumeroDeQuestoes();
        $qtdQuestao = Questao::topQuestoes();

        return view('admin.relatorio_qtd_questao_av')
                    ->with('professores_top_questao', $resultado)
                    ->with('disciplinas', $disciplinas)
                    ->with('qtdQuestao', $qtdQuestao);
    }
    

}
