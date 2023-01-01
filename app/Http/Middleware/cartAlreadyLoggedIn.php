<?php

namespace App\Http\Middleware;

use Closure;

class cartAlreadyLoggedIn
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
        
        if (auth()->user()){ /* this condition works for (user_type -> "customer") ONLY! because cart page 
                                is shown only for the registered users with the user type -> "customer" */
            return redirect()->route('cart-registered');
        }

        return $next($request);
    }
}