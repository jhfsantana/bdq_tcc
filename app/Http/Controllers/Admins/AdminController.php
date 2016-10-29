<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Professor;
use App\Models\Aluno;

class AdminController extends Controller
{
	

    public function index()
    {
        $total = Professor::totalProfessores();
        $alunos = ALuno::totalAlunos();
        return view ('admin.index')->with('professores', $total)
                                   ->with('alunos', $alunos);
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

    public function relatorio()
    {
        $resultado = Professor::professorComMaiorNumeroDeQuestoes();

        return view('admin.relatorios')->with('professores_top_questao', $resultado);
    }
    

}
