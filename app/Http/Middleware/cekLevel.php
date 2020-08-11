<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class cekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$levels)
    {
        if($request->user()->level == "student"){
            Auth::logout();
        }else if(in_array($request->user()->level,$levels)){
            return $next($request);
        }
        return redirect('/');
    }
}
