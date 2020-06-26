<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Arr;
use Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //admin
        $locale = \App::getLocale();
        $parameters = \Request::segments();
        if(!empty($parameters[1]) && $parameters[1]=='admin'){
            return route('lang.admin.login');
        }

        //front end
        if (! $request->expectsJson()) {
            return route('lang.login');
        }
    }
}
