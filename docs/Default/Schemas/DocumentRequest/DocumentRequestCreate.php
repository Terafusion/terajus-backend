<?php

namespace Docs\Default\Schemas\DocumentRequest;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={
 * "client_id", 
 * "documents"
 * }))
 */
class DocumentRequestCreate
{
    /**
     * @OA\Property()
     */
    public int $client_id;

    /**
     * @OA\Property(
     *     type="array",
     *     @OA\Items(
     *         @OA\Property(
     *             property="document_type_id",
     *             type="integer"
     *         )
     *     )
     * )
     */
    public array $documents;
}