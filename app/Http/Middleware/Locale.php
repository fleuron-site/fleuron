<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Locale
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
        $locale = session('locale');
        $conversion = [
          'fr' => 'fr_FR',
          'en' => 'en_US',
        ];
        
        setlocale(LC_TIME, $locale);

        if(!session()->has('locale')) {
            session(['locale' => $request->getPreferredLanguage(config('app.locales'))]);
        }
        app()->setLocale(session('locale'));
        setlocale(LC_TIME, session('locale'));
        return $next($request);
    }
}
