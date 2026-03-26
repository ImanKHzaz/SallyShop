<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // التحقق من أن المستخدم مسجل دخول
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول للوصول إلى هذه الصفحة.');
        }

        $user = Auth::user();

        // التحقق من أن المستخدم لديه أحد الأدوار المطلوبة
        if (!$user->hasAnyRole($roles)) {
            abort(403, 'غير مصرح بالدخول.');
        }

        return $next($request);
    }
}
