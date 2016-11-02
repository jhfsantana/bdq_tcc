<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Professor;
use App\Models\Disciplina;
use App\Models\Aluno;
use Charts;
use Illuminate\Support\Facades\Input;

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

    public function store(Request $request)
    {
    	$admin = new Admin;

    	$admin->name = $request->name;
    	$admin->email = $request->email;

    	$cryptPassword = bcrypt($request->password);
    	$admin->password = $cryptPassword;

    	$admin ->save();

    	return redirect('admin.auth');
    }

    public function relatorio($id)
    {   
        $disciplinas = Disciplina::all();
        $data = '2016-10-30';
        $resultado = Professor::professorComMaiorNumeroDeQuestoes();
        $notas = Professor::notas($data, $id);

        return view('admin.relatorios')
                    ->with('professores_top_questao', $resultado)
                    ->with('notas', $notas)
                    ->with('disciplinas', $disciplinas);
    }
    

}
