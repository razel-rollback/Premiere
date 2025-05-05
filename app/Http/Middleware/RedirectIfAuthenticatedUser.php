<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('sections.index');
        }
        if (auth()->guard('student')->check()) {
            return redirect()->route('student.profile');
        }

        return $next($request);
    }
}
