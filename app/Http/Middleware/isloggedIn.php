<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isloggedIn
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
                
                return $next($request);
            }
        }
       return redirect('/')->with('error','Please Login First');
        return $next($request);
    }
}
