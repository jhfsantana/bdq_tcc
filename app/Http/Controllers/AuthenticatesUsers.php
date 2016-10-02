<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse as Redirection;
use Auth;
use Request;
trait AuthenticatesUsers
{


    public function __construct()
    {
        $this->middleware("guest:$this->guard", ['except' => 'logout']);
    }

    public function login(Request $request, Auth $auth): Redirection
    {

       	  $credentials = (Request::only('email','password'));
       	  //dd($credentials);
       	  $authorized = Auth::guard($this->guard)->attempt($credentials);
        if ($authorized) {

            return redirect()->intended($this->redirectTo);
        }

        return back()
            ->with('authError', 'Email ou senha incorretos')
            ->withInput(Request::except('password'));
    }

    public function logout(Auth $auth): Redirection
    {
        Auth::guard($this->guard)->logout();
        
        return redirect()->intended($this->loginArea);
    }









}