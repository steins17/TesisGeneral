<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Carbon\Carbon;

class Language
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
        if(session('applocate')){
            $configLanguage = config('languages')[session('applocate')];
            setlocale(LC_TIME, $configLanguage[1] . '.utf8');
            Carbon::setLocale(session('applocate'));
            App::setLocale(session('applocate'));
        }else{
            session()->put('applocate', config('app.fallback_locale'));
            setLocale(LC_TIME, 'es_ES.utf8');
            Carbon::setLocale(session('applocate'));
            App::setLocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}