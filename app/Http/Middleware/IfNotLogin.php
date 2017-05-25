<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class IfNotLogin
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
    	if (Session::get('idwalas') || Session::get('idadmin') != null) {
       		 return $next($request);
    	}
    		return redirect()->route('login')->with('msg', 'Anda harus login !');
    }
}
