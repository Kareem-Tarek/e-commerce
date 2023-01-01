<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class onlyGuests
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
        // Here in this logic it means the "guest" since it's not any of the user types from the DB
        if(isset(auth()->user()->user_type)){
            if(auth()->user()->user_type == "customer" || auth()->user()->user_type == "supplier" ||
                auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){

                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
