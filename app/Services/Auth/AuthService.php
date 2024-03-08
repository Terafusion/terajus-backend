<?php

// app/Services/Auth/AuthService.php

namespace App\Services\Auth;

use App\Models\User\User;
use App\Models\Tenant\Tenant;
use App\Repositories\User\UserRepository;
use App\Services\User\UserService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /** @var UserService */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Register and login user
     * 
     * @param array $data
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
     * @param User $user
     * @return void
     */
    private function createTenantForUser(User $user)
    {
        $tenant = Tenant::create(['name' => $user->name . '\'s Tenant', 'user_id' => $user->id]);
        $this->userService->update(['is_tenant' => true, 'tenant_id' => $tenant->id], $user);
    }
}
