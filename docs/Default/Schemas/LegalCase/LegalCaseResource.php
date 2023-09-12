<?php

namespace Docs\Default\Schemas\LegalCase;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class LegalCaseResource
{
    /**
     * @OA\Property()
     */
    public LegalCase $data;

    /**
     * @OA\Property(example="integer")
     */
    public int $statusCode;
}
