<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class WalasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'walas')
    {
        if (Session::get('idwalas') === null) {
            return redirect()->back()->with('pesan', 'Halaman Ini khusus untuk Walas !');
        }
        return $next($request);
    }
}
