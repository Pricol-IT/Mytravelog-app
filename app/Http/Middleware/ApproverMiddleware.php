<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApproverMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (authUser()->role == 'approver') {
            return $next($request);
        }

        if (authUser()->role == 'user') {
            return redirect()->route('user.home');
        }

        if (authUser()->role == 'accountant') {
            return redirect()->route('accountant.home');
        }

        if (authUser()->role == 'travels') {
            return redirect()->route('travels.home');
        }

        return redirect()->route('login');
    }
}
