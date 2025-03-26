<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{

    public function handle(Request $request, Closure $next)
    {
        // Check if the user is not authenticated
        if (!Auth::check() || Auth::user()->usertype !== '1') {
            // Redirect the user to the login page with an error message
            return redirect()->back();
        }

        // If the user is authenticated, proceed with the request
        return $next($request);
    }
}
