<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Services\Role\RoleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function __construct(private RoleService $roleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->showAll($this->roleService->getAll($request->user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        return $this->showOne($this->roleService->store($request->validated()), Response::HTTP_CREATED);
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        return $this->showOne($this->roleService->update($request->validated(), $id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne($this->roleService->getById($id));
    }

    /**
     * Destroy an role
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roleService->delete($id);

        return $this->showMessage('Success');
    }
}
