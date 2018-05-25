<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class myadmin extends Middleware
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
        // проверяем принадлежность пользователя
        //if ( Auth::check() && Auth::user()->isAdmin()==true )
        if ( Auth::check() )
        {
            //return $next($request);
            return 1;
        }
        return redirect('/');
    }
}
