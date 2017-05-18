<?php

namespace App\Http\Middleware;

use Closure;

class Lang
{
    public function handle($request, Closure $next)
    {
        if($lang = \Session::get('lang')){
            \Lang::setLocale($lang);
        }
        return $next($request);
    }
}
