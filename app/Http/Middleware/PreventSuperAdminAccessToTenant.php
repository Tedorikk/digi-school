<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventSuperAdminAccessToTenant
{
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current domain (this will check if it's the tenant or central domain)
        $currentDomain = $request->getHost();

        // Define your central domain
        $centralDomain = env('CENTRAL_DOMAIN', 'localhost'); // You can configure this in your .env

        // Check if the current domain is a tenant domain (not central)
        if ($currentDomain == $centralDomain) {
            // Block super admin from accessing the tenant domain
            abort(403, 'Super admin cannot access tenant domain.');
        }

        return $next($request);
    }
}
