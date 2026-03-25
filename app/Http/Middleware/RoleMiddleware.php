<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول للوصول إلى هذه الصفحة.');
        }

        $user = Auth::user();

        if (!$user->hasAnyRole($roles)) {
            abort(403, 'غير مصرح بالدخول.');
        }

        return $next($request);
    }
}
