<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated as RediredAuthenticatedMiddleware;

class RedirectAuthenticated extends RediredAuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response | JsonResponse
    {
        if(Auth::guard('admin')->check()) {
            return redirect(route('admin.dashboard.index'));
        } else if(Auth::guard('member')->check()) {
            return redirect(route('member.dashboard.index'));
        }

        return $next($request);
    }
}
