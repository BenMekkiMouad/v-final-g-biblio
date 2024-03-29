<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        //admin
        if(Auth::user()->role == 1){
            return $next($request); 
        }else{
            abort(403,'Unauthorized Action');
        }
        /*
        //manager
        if(Auth::user()->role == 2){
            return redirect()->route('manager'); 
        }
        //user
        if(Auth::user()->role == 3){
            return redirect()->route('user'); 
        }*/
    }
}
