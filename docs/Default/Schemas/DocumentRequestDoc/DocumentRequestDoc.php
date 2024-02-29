<?php

namespace Docs\Default\Schemas\DocumentRequestDoc;

use Docs\Default\Schemas\DocumentType\DocumentType;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class DocumentRequestDoc
{
    /**
     * @OA\Property()
     */
    public int $id;

    /**
     * @OA\Property()
     */
    public int $document_id;

    /**
     * @OA\Property()
     */
    public int $document_request_id;

    /**
     * @OA\Property()
     */
    public int $document_type_id;

    /**
     * @OA\Property()
     */
    public string $status;
    
    /**
     * @OA\Property()
     */
    public string $description;

    /**
     * @OA\Property()
     */
    public string $created_at;

    /**
     * @OA\Property()
     */
    public string $updated_at;

    /**
     * @OA\Property()
     */
    public DocumentType $document_type;
}
