<?php

namespace Docs\Default\Schemas\Role;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Role",
 *     description="Role response representation",
 *
 *     @OA\Xml(
 *         name="Role"
 *     )
 * )
 */
class RoleResponse
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="Role ID",
     *     format="int64"
     * )
     */
    public int $id;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Role's name",
     *     example="Admin"
     * )
     */
    public string $name;

    /**
     * @OA\Property(
     *     title="Permissions",
     *     description="Role's permissions",
     *     type="array",
     *
     *     @OA\Items(ref="#/components/schemas/PermissionResponse")
     * )
     */
    public array $permissions;
}
