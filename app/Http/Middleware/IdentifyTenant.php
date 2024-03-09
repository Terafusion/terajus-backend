<?php

namespace App\Http\Middleware;

use App\Models\User\User;
use Closure;
use Tenancy\Facades\Tenancy;

class IdentifyTenant
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->tenant_id !== null) {
            Tenancy::setTenant($user->tenant);
        }

        return $next($request);
    }
}
