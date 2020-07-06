<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        $yourAge = $request->age; // lay duoc tham so truyen vao route
        if($yourAge < 18){
            return redirect()->route('khong.duoc.xem');
        }
        // tiep tuc thuc thi request tiep theo
        return $next($request);
    }
}
