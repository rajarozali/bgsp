<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Request;
class Authenticate
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        $flag = 0;
        $view_array = (['auth', 'password', 'register']); ##urls can be  view by all users
        foreach ($view_array as $val) {
            if (Request::segment(1) == $val ||Request::segment(1)!='admin' ) {
                $flag = 1;
                break;
            }
        }

        if (($this->auth->check() || $flag)) {
            return $next($request);
        }
        return redirect('/auth/login');
    }
}