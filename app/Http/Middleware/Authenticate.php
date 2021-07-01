<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

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
        // dd($request);

        if (! $request->expectsJson()) {

            if(Route::is('superadmin.*')){
                return route('superadmin.login');
            }

            if(Route::is('employee.*')){
                return route('employee.login');
            }

            return route('login');
        }
    }
}
