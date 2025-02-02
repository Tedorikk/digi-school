<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Stancl\Tenancy\Resolvers\DomainTenantResolver;
use Stancl\Tenancy\Resolvers\TenantResolver;

class PreventTenantAccessToSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentDomain = $request->getHost();

        $centralDomain = env('CENTRAL_DOMAIN', 'localhost');

        if ($currentDomain !== $centralDomain) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }

}
