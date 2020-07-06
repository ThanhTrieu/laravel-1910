<?php

namespace App\Http\Middleware;

use Closure;

class CheckTokenViewApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $params)
    {
        // $params : tham so truyen vao middleware
//        if($params !== 'abcd12345'){
//            return redirect()->route('not.permit');
//        }
//        return $next($request);

        // after middleware
        $response = $next($request);
        if($params !== 'abcd12345'){
            return redirect()->route('not.permit');
        }
        return $response;
    }
}
