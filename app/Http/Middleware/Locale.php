<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
{

    public function handle($request, Closure $next)
    {
        if (!Session::has('language')){
            Session::put('language',config('app.locale'));
        }

        App::setLocale(Session::get('language'));

        return $next($request);
    }
}
