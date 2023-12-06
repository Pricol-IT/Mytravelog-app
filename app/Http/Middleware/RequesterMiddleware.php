<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequesterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);

        if (authUser()->role == 'user') {
            return $next($request);
        }

        if (authUser()->role == 'approver') {
            return redirect()->route('approver.home');
        }

        return redirect()->route('login');
    }
}
