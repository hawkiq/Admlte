<?php

namespace Hawkiq\Admlte\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->cookie('app_locale', config('app.locale'));
        App::setLocale($locale);

        return $next($request);
    }
}