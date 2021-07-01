<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
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
        $checkadmin = Auth::user()->role_name;
        dd($checkadmin);
        if ($checkadmin == 2) {

            // return $next($request);
            return view('dashboard');
        }
        else {
            // Session::flash("nopermission", "You have no permission!");
            // return redirect()->back();
            return abort(403);
        }

        // return $next($request);
    }
}
