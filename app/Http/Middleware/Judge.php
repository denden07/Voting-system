<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Judge
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


        if (Auth::check()){

            if(Auth::user()->isJudge()){

                return $next($request);
            }
            return redirect('judge');
        }
//
        return redirect('/logout') ->with(['error' => "You do not have the permission to enter this site. Please login with correct user."]);
    }
}
