<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutoChekPermsions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // تحقق من تسجيل الدخول
        if (!$user) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        // جلب اسم الميثود من الـ Route
        $actionName = $request->route()->getActionMethod();

        // عمليات ممنوعة على المستخدمين بدون دور
        $restrictedMethods = ['create', 'store', 'edit', 'update', 'destroy'];

        // إذا كان المستخدم بدون دور ويطلب ميثود مقيد
        if (!$user->hasRole('Admin') && in_array($actionName, $restrictedMethods)) {
            return abort(403);
        }

        return $next($request);
    }
}
