<?php

namespace Docs\Default\Schemas\ParticipantType;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class ParticipantTypeResource
{
    /**
     * @OA\Property()
     */
    public ParticipantTypeResponse $data;

    /**
     * @OA\Property(example="integer")
     */
    public int $statusCode;
}
