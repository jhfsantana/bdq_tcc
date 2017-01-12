<?php

namespace App\Http\Controllers\Professores;

use Illuminate\Contracts\View\View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'professor';
    protected $guard = 'web_teachers';
    protected $loginArea = 'professor/login';

   
    public function index()
    {
    	return view('professores.index');
    }
}
