<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpRestrictionMiddleware
{
    /**
     * Only allow IPs from the configured whitelist
     * to access Admin area.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIps = config('admin.allowed_ips', ['127.0.0.1', '::1']);
        $clientIp   = $request->ip();

        if (!in_array($clientIp, $allowedIps, true)) {
            abort(403, 'Your IP address is not authorized to access the admin panel.');
        }

        return $next($request);
    }
}
