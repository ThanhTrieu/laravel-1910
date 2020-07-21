<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdminLogin
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
        if(!$this->checkInfoAdminLogin($request)){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }

    private function checkInfoAdminLogin($request)
    {
        $sessionId = $request->session()->get('idAdmin');
        $sessionId = is_numeric($sessionId) && $sessionId > 0 ? true : false;
        return $sessionId;
    }
}
