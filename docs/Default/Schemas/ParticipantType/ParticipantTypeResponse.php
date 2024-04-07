<?php

namespace Docs\Default\Schemas\ParticipantType;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="ParticipantTypeResponse",
 *     description="ParticipantType resource representation",
 *
 *     @OA\Xml(
 *         name="ParticipantTypeResponse"
 *     )
 * )
 */
class ParticipantTypeResponse
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ParticipantType ID",
     *     format="int64"
     * )
     */
    public int $id;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="ParticipantType type",
     *     example="Polo Ativo"
     * )
     */
    public string $type;

    /**
     * @OA\Property(
     *     title="Created At",
     *     description="ParticipantType creation timestamp",
     *     example=null
     * )
     */
    public ?string $created_at;
}
