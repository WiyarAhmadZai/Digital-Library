<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Assuming you store role in 'role' column or 'is_admin' boolean
        if (auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->is_admin)) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
