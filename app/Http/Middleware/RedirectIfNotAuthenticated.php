<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{

    public function handle(Request $request, Closure $next)
    {
        // Check if the user is not authenticated
        if (!Auth::check()) {
            // Redirect the user to the login page with an error message
            return redirect()->back();
        }

        // If the user is authenticated, proceed with the request
        return $next($request);
    }
}
