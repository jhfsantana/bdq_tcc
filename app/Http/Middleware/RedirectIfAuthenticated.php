<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'web_admins':
                    if (Auth::guard($guard)->check()) {
                        
                        return redirect('/home');
                    }        
                break;
            case 'web_teachers':
                    if (Auth::guard($guard)->check()) {
                        
                        return redirect('/professor');
                    }
                break;
            case 'web_students':
                    if (Auth::guard($guard)->check()) {
                        
                        return redirect('/aluno');
                    }
                break;
            default:
                break;
        }
        
        return $next($request);
    }
}
