<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use App\Http\Resources\User\UserResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    /**
     * Register and login user
     */
    public function signUp(SignUpRequest $request)
    {
        return $this->showOne($this->authService->signUp($request->validated()), Response::HTTP_OK, UserResource::class);
    }
}
