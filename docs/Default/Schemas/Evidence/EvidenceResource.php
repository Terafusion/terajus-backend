<?php

namespace Docs\Default\Schemas\Evidence;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class EvidenceResource
{
    /**
     * @OA\Property()
     */
    public Evidence $data;

    /**
     * @OA\Property(example="integer")
     */
    public int $statusCode;
}
