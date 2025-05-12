<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthenticate
{
    public function handle(Request $request, Closure $next, string $guard = "")
    {
        if (!Auth::guard($guard)->check()) {
            // Redirect based on guard or URL path
            if ($request->is('admin/*')) {
                return redirect()->route('admin.login');
            }

            if ($request->is('student/*')) {
                return redirect()->route('student.login');
            }

            return redirect()->route('home.index'); // fallback
        }

        return $next($request);
    }
}
