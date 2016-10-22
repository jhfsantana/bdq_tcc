<?php

namespace App\Http\Controllers\Alunos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
   	use AuthenticatesUsers;

    protected $redirectTo = 'aluno';
    protected $guard = 'web_students';
    protected $loginArea = 'aluno/login';

   
    public function index(): View
    {
    	return view('aluno.index');
    }
}
