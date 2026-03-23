<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Check access permission based on ma_quyen.
     * Usage: middleware('role:1') for Admin, middleware('role:2') for Client.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to continue.');
        }

        if ((int) auth()->user()->ma_quyen !== (int) $role) {
            abort(403, 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
