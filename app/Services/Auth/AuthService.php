<?php

namespace App\Services\Auth;

use App\Models\Tenant\Tenant;
use App\Models\User\User;
use App\Services\User\UserService;
use Tenancy\Facades\Tenancy;

class AuthService
{
    public function __construct(private UserService $userService)
    {
    }

    /**
     * Register and login user
     *
     * @return User
     */
    public function signUp(array $data)
    {
        try {
            $user = $this->userService->store($data);

            if (isset($data['create_tenant']) && $data['create_tenant'] === true) {
                $this->createTenantForUser($user);
            }

            $token = $user->createToken(env('PASSPORT_GRANT_PASSWORD'))->accessToken;
            $user->setAppends(['access_token' => $token, 'role' => $user->roles()->first()]);

            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Cria um novo tenant para advogado
     *
     * @return void
     */
    private function createTenantForUser(User $user)
    {
        $tenant = Tenant::create(['name' => $user->name.'\'s Tenant', 'user_id' => $user->id]);
        $this->userService->update(['is_tenant' => true, 'tenant_id' => $tenant->id], $user);
        Tenancy::setTenant($tenant);
    }
}
