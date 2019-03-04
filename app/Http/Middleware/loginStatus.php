<?php

namespace App\Http\Middleware;

use Closure;

class loginStatus
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
        if($request->hasCookie('name')){
            return $next($request);
        }
        else{
            if($request->session()->has('user')){
                $status = $request->session()->get('user');
                if($status){
                    return $next($request);
                }
                else{
                    return redirect()->route('formdangnhap');
                }
            }
            else{
                return redirect()->route('formdangnhap');
            }
        }
    }
}
