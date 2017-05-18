<?php

namespace App\Http\Middleware;


use Auth;
use Closure;
use Request;
use Session;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class CheckView
{
    public function handle($request, Closure $next)
    {
        return $next($request);

    }
}