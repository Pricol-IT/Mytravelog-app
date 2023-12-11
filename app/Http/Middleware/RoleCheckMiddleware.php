<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('user')->check() && authUser()->role == 'user') {
            return redirect()->route('user.home');
        } elseif (auth('user')->check() && authUser()->role == 'approver') {
            return redirect()->route('approver.home');
        }

        return redirect('login');
    }
}
