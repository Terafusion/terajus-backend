<?php

namespace Docs\Default\Schemas\Permission;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Permission",
 *     description="Permission resource representation",
 *
 *     @OA\Xml(
 *         name="Permission"
 *     )
 * )
 */
class PermissionResponse
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="Permission ID",
     *     format="int64"
     * )
     */
    public int $id;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Permission's name",
     *     example="Read"
     * )
     */
    public string $name;
}
