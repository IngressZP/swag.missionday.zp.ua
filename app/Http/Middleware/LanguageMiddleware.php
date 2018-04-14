<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LanguageMiddleware
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
        if (session('lang'))
            App::setLocale(session('lang'));
        return $next($request);
    }
}
