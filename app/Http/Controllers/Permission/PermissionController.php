<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Services\Permission\PermissionService;

class PermissionController extends Controller
{
    public function __construct(private PermissionService $permissionService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll($this->permissionService->getAll());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne($this->permissionService->getById($id));
    }
}
