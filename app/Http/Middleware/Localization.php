<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
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
        if ( \Session::has('lang')) {
            // Récupération de la 'lang' dans Session et activation
            \App::setLocale(\Session::get('lang'));
        }
        
        return $next($request);
    }
}
