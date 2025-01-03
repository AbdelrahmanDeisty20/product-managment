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


        


        $actionName = $request->route()->getActionMethod();


        $restrictedMethods = ['create', 'store', 'edit', 'update', 'destroy'];


        if (!$user->hasRole('Admin') && in_array($actionName, $restrictedMethods)) {
            return abort(403);
        }

        return $next($request);
    }
}
