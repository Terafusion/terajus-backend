<?php

namespace App\Http\Middleware;

use App\Models\User\User;
use Closure;
use Tenancy\Facades\Tenancy;

class IdentifyTenant
{
    public function handle($request, Closure $next)
    {
        // Identifique o tenant com base no usuário autenticado
        $user = auth()->user();

        if ($user && $user->tenant_id !== null) {
            Tenancy::setTenant($user->tenant);
        }

        return $next($request);
    }
}
