<?php

namespace App\Services\Auth;

use App\Models\User\User;
use App\Repositories\User\UserRepository;
use App\Services\User\UserService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
            $user->assignRole($data['role']);
            $token = $user->createToken(env('PASSPORT_GRANT_PASSWORD'))->accessToken;
            $user->setAppends(['access_token' => $token, 'role' => $user->roles()->first()]);
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Register and login user
     * 
     * @param array $data
     * @return User
     */
    public function centralSignUp(array $data)
    {
        try {
            $user = $this->userService->store($data);
            $token = $user->createToken(env('PASSPORT_GRANT_PASSWORD'))->accessToken;
            $user->setAppends(['access_token' => $token]);
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
