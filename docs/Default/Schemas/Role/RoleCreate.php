<?php

namespace Docs\Default\Schemas\Role;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={"name", "permissions"})
 */
class RoleCreate
{
    /**
     * @OA\Property(maximum="255")
     */
    public string $name;

    /**
     * @OA\Property(
     *     type="array",
     *     @OA\Items(type="integer")
     * )
     */
    public array $permissions;
}