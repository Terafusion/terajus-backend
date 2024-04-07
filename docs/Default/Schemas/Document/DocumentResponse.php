<?php

namespace Docs\Default\Schemas\Document;

use Docs\Default\Schemas\DocumentType\DocumentTypeResource;
use Docs\Default\Schemas\User\UserResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Document",
 *     description="Document resource representation"
 * )
 */
class DocumentResponse
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="Document ID",
     *     format="int64"
     * )
     */
    public int $id;

    /**
     * @OA\Property(
     *     title="User ID",
     *     description="User ID associated with the document",
     *     format="int64"
     * )
     */
    public int $user_id;

    /**
     * @OA\Property(
     *     title="User",
     *     description="User information",
     *     ref="#/components/schemas/UserResource"
     * )
     */
    public UserResource $user;

    /**
     * @OA\Property(
     *     title="DocumentType",
     *     description="DocumentType information",
     *     ref="#/components/schemas/DocumentTypeResource"
     * )
     */
    public DocumentTypeResource $document_type;

    /**
     * @OA\Property(
     *     title="Document Type ID",
     *     description="Document Type ID associated with the document",
     *     format="int64"
     * )
     */
    public ?int $document_type_id;

    /**
     * @OA\Property()
     */
    public string $description;

    /**
     * @OA\Property(
     *     title="Created At",
     *     description="Document creation timestamp",
     *     example="2024-02-24T22:40:33.000000Z"
     * )
     */
    public string $created_at;

    /**
     * @OA\Property(
     *     title="Updated At",
     *     description="Document update timestamp",
     *     example="2024-02-24T22:40:33.000000Z"
     * )
     */
    public string $updated_at;
}
