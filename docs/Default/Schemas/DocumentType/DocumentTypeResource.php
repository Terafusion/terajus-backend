<?php

namespace Docs\Default\Schemas\DocumentType;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class DocumentTypeResource
{
    /**
     * @OA\Property()
     */
    public DocumentType $data;

    /**
     * @OA\Property(example="integer")
     */
    public int $statusCode;
}
