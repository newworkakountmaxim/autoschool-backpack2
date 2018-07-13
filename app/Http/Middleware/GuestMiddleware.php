<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
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
      $user = Auth::user();
        if( ($user && $user->hasRole('superadmin')) || ($user && $user->hasRole('teacher'))  ){
          return $next($request);
        }
        return response()->view('errors.404');
        //return redirect('/');
    }
}
