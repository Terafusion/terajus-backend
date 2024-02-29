<?php

namespace Docs\Default\Schemas\DocumentRequest;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="DocumentRequestUpdate",
 *     description="DocumentRequest update request representation",
 *     @OA\Xml(
 *         name="DocumentRequestUpdate"
 *     )
 * )
 */
class DocumentRequestUpdate
{
    /**
     * @OA\Property(
     *     title="Status",
     *     description="DocumentRequest status",
     *     example="APPROVED"
     * )
     */
    public ?string $status;

    /**
     * @OA\Property(
     *     title="Document Request Docs",
     *     description="Array of document_request_docs with status",
     *     @OA\Items(
     *         @OA\Property(property="id", type="integer", example=3),
     *         @OA\Property(property="status", type="string", example="COMPLETED")
     *     )
     * )
     */
    public ?array $document_request_docs;
}
