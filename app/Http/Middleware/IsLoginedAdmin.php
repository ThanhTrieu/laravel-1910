<?php

namespace App\Http\Middleware;

use Closure;

class IsLoginedAdmin
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
        $idSession = $request->session()->get('idAdmin');
        $idSession = is_numeric($idSession) && $idSession > 0 ? true : false;
        if($idSession){
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
