<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /** @var AuthService */
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Register and login user
     */
    public function signUp(SignUpRequest $request)
    {
        return $this->showOne($this->authService->signUp($request->validated()), Response::HTTP_OK, UserResource::class);
    }
}
