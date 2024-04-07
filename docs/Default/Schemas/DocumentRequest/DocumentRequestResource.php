<?php

namespace Docs\Default\Schemas\DocumentRequest;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class DocumentRequestResource
{
    /**
     * @OA\Property()
     */
    public DocumentRequestResponse $data;

    /**
     * @OA\Property(example="integer")
     */
    public int $statusCode;
}
