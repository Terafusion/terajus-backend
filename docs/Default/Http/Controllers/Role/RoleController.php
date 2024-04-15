<?php

namespace Docs\Default\Http\Controllers\Role;

use OpenApi\Annotations as OA;

class RoleController
{
    /**
     * @OA\Post(
     *      path="/roles",
     *      operationId="storeRole",
     *      tags={"Roles"},
     *      summary="Store new role",
     *      description="Returns role data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/RoleCreate")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/RoleResponse")
     *       ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/RequestException")
     *       ),
     *       @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(ref="#/components/schemas/ValidationError")
     *       ),
     *       security={
     *           {"Bearer": {}}
     *       }
     *     )
     */
    public function store()
    {
    }

    /**
     * @OA\Get(
     *     path="/roles",
     *     operationId="getRoles",
     *     tags={"Roles"},
     *     summary="Get list of roles",
     *     description="Returns list of roles",
     *     @OA\Parameter(
     *         name="filter[search]",
     *         in="query",
     *         description="Filter roles by name",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="sort",
     *         in="query",
     *         description="Sort roles by created_at. Use -created_at for descending order",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/RoleResponse")
     *     ),
     *     security={
     *         {"Bearer": {}}
     *     }
     * )
     */
    public function index()
    {
    }

    /**
     * @OA\Get(
     *     path="/roles/{id}",
     *     operationId="getRoleById",
     *     tags={"Roles"},
     *     summary="Get role information",
     *     description="Returns role data",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of role that needs to be fetched",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/RoleResponse")
     *     ),
     *     security={
     *         {"Bearer": {}}
     *     }
     * )
     */
    public function show()
    {
    }

    /**
     * @OA\Put(
     *     path="/roles/{id}",
     *     operationId="updateRole",
     *     tags={"Roles"},
     *     summary="Update an existing role",
     *     description="Returns updated role data",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of role that needs to be updated",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RoleCreate")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/RoleResponse")
     *     ),
     *     security={
     *         {"Bearer": {}}
     *     }
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *     path="/roles/{id}",
     *     operationId="deleteRole",
     *     tags={"Roles"},
     *     summary="Delete a role",
     *     description="Deletes and returns deleted role data",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of role that needs to be deleted",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/RoleResponse")
     *     ),
     *     security={
     *         {"Bearer": {}}
     *     }
     * )
     */
    public function delete()
    {
    }
}