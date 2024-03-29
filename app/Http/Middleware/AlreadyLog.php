<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session()->has('adminID') && ((url('/')==$request->url()) || (url('register')==$request->url()))){
            return back();
        }
        if(Session()->has('accountId') && ((url('/')==$request->url()) || (url('register')==$request->url()))){
            return back();
        }
        if(Session()->has('inspectorId') && ((url('/')==$request->url()) || (url('register')==$request->url()))){
            return back();
        }
        return $next($request);
    }
}
