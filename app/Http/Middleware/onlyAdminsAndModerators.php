<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class onlyAdminsAndModerators
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
        /* the logic means that if any other user type from the DB but not the "customer" or "supplier", will 
           be taken to the main website's home page. Except for the "guest" since it's not a user type from 
           the DB so,.. 

           - for Contact page's logic for the "guest" is handled in the -> (ContactController.php). So "returning" in the 
             controller means after completing a specific action from the CRUD, while here in the middleware handles the 
             routing itself which means what the user is able to visit and what he/she is not able to visit.
        */

        if(isset(auth()->user()->user_type)){
            if(auth()->user()->user_type != "customer" && auth()->user()->user_type != "supplier"){
                return redirect()->route('home');
            }
        }
        
        return $next($request);
    }
}
