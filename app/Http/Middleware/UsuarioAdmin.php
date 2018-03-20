<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class UsuarioAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::get('tipo') == 1)
            return $next($request);
            
        return Redirect::route('login');
    }
}
