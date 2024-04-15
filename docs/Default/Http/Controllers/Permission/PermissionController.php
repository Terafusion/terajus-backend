<?php

namespace Docs\Default\Http\Controllers\Permission;

use OpenApi\Annotations as OA;

class PermissionController
{
    /**
     * @OA\Get(
     *     path="/permissions",
     *     operationId="getPermissions",
     *     tags={"Permissions"},
     *     summary="Get list of permissions",
     *     description="Returns list of permissions",
     *
     *     @OA\Parameter(
     *         name="filter[search]",
     *         in="query",
     *         description="Filter permissions by name",
     *         required=false,
     *
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *
     *     @OA\Parameter(
     *         name="sort",
     *         in="query",
     *         description="Sort permissions by created_at. Use -created_at for descending order",
     *         required=false,
     *
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *
     *         @OA\JsonContent(ref="#/components/schemas/PermissionResponse")
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
     *     path="/permissions/{id}",
     *     operationId="getPermissionById",
     *     tags={"Permissions"},
     *     summary="Get permission information",
     *     description="Returns permission data",
     *
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of permission that needs to be fetched",
     *         required=true,
     *
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *
     *         @OA\JsonContent(ref="#/components/schemas/PermissionResponse")
     *     ),
     *     security={
     *         {"Bearer": {}}
     *     }
     * )
     */
    public function show()
    {
    }
}
