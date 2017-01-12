<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Contracts\View\View;


use App\Http\Controllers\AuthenticatesUsers;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'home';
    protected $guard = 'web_admins';
    protected $loginArea = 'admin';


    public function index()
    {
    	return view('admin.index');
    }


}
