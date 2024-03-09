<?php

namespace App\Services\Auth;

use App\Models\User\User;
use App\Repositories\User\UserRepository;
use App\Services\Address\AddressService;
use App\Services\User\UserService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthService
{

    public function __construct(private UserService $userService, private AddressService $addressService)
    {
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
            $this->addressService->store($data['address'], $user);
            $user->setAppends(['access_token' => $token, 'role' => $user->roles()->first()]);
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
