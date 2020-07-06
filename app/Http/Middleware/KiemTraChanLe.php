<?php

namespace App\Http\Middleware;

use Closure;

class KiemTraChanLe
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
        $number = $request->number;
        if(!$this->kiemTraSo($number)){
            return redirect()->route('number.warning');
        }
        return $next($request);
    }

    private function kiemTraSo($n)
    {
        if( $n % 2 == 0 ){
            return true;
        }
        return false;
    }
}
