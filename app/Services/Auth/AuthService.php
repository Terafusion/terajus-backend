<?php

namespace App\Services\Auth;

use App\Models\User\User;
use App\Services\Address\AddressService;
use App\Services\User\UserService;

class AuthService
{
    public function __construct(private UserService $userService, private AddressService $addressService)
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
            $token = $user->createToken(env('PASSPORT_GRANT_PASSWORD'))->accessToken;
            $user->setAppends(['access_token' => $token, 'role' => $user->roles()->first()]);

            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
