<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checklogged
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
        if($request->session()->has("user")){
            $this->data['user'] =  $request->session()->get("user");
            if( $this->data['user']['isLoggedIn']==true){
                if($this->data['user']['role']=='isAdmin'){
                    return redirect('dashboard');

                }
                return redirect('template');
            }
        }
        return $next($request);
    }
}
