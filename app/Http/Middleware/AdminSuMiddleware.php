<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class AdminSuMiddleware
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
      if(Session::get('idadmin') === null)
      {
        return redirect()->back()->with('pesan', 'Halaman Khusus Admin !');
      }
        return $next($request);
    }
}
