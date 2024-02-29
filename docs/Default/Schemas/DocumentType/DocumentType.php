<?php

namespace Docs\Default\Schemas\DocumentType;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class DocumentType
{
    /**
     * @OA\Property()
     */
    public int $id;

    /**
     * @OA\Property()
     */
    public string $name;

    /**
     * @OA\Property()
     */
    public string $description;
}
