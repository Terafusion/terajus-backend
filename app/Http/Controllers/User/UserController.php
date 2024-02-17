<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\User\User;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function __construct(private UserService $userService)
    {
        //$this->middleware('can:viewAny,users', ['index']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->showAll($this->userService->getAll($request->user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        return $this->showOne($this->userService->store($request->validated()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        return $this->showOne($this->userService->update($request->validated(), $user), Response::HTTP_OK);
    }

    /**
     * ***-PUT YOUR LOGIC TO DELETE-***
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return $this->showMessage('Success');
    }

    public function me()
    {
        return $this->showOne(auth()->user());
    }
}
