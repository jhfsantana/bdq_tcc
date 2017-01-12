<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse as Redirection;
use Auth;
use Request;
use Illuminate\Support\MessageBag;
trait AuthenticatesUsers
{


    public function __construct()
    {
        $this->middleware("guest:$this->guard", ['except' => 'logout']);
    }

    public function login(Request $request, Auth $auth)
    {
        $errors = new MessageBag;

       	  $credentials = (Request::only('email','password'));
       	  //dd($credentials);
       	  $authorized = Auth::guard($this->guard)->attempt($credentials);
        if ($authorized) {

            return redirect()->intended($this->redirectTo);
        }
        else
        {
            $errors = new MessageBag(['password' => ['E-mail ou senha inválidos']]);
            return back()
            ->withErrors($errors);
        }
        
    }

    public function logout(Auth $auth)
    {
        Auth::guard($this->guard)->logout();
        
        return redirect()->intended($this->loginArea);
    }









}