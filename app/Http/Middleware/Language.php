<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Language
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
        if (Session::has('language') && array_key_exists(Session::get('language'), Config::get('language'))){
            $locale = Session::get('language');
        } else{
            $locale = Config::get('app.fallback_locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
