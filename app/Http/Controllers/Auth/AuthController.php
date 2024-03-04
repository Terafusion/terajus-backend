<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use App\Http\Resources\User\UserCentralResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    public function __construct(private AuthService $authService)
    {
    }

    /**
     * Register and login user
     * 
     * @param SignupRequest $request
     */
    public function signUp(SignUpRequest $request)
    {
        return $this->showOne($this->authService->signUp($request->validated()), Response::HTTP_OK, UserResource::class);
    }

    /**
     * Register and login user
     * 
     * @param SignupRequest $request
     */
    public function centralSignUp(SignUpRequest $request)
    {
        return $this->showOne($this->authService->centralSignUp($request->validated()), Response::HTTP_OK, UserCentralResource::class);
    }
}
