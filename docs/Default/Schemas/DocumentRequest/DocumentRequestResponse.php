<?php

namespace Docs\Default\Schemas\DocumentRequest;

use Docs\Default\Schemas\DocumentRequestDoc\DocumentRequestDoc;
use Docs\Default\Schemas\User\UserResponse;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="DocumentRequest",
 *     description="DocumentRequest resource representation",
 *     @OA\Xml(
 *         name="DocumentRequest"
 *     )
 * )
 */
class DocumentRequestResponse
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="DocumentRequest ID",
     *     format="int64"
     * )
     */
    public int $id;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="DocumentRequest status",
     *     example="PENDING"
     * )
     */
    public string $status;

    /**
     * @OA\Property(
     *     title="User ID",
     *     description="User ID associated with the DocumentRequest",
     *     format="int64"
     * )
     * 
     */
    public int $user_id;

    /**
     * @OA\Property(
     *     title="Client ID",
     *     description="Client ID associated with the DocumentRequest",
     *     format="int64"
     * )
     */
    public int $client_id;

    /**
     * @OA\Property(
     *     title="User",
     *     description="User solicitant from the DocumentRequest",
     *     ref="#/components/schemas/UserResponse"
     * )
     */
    public UserResponse $user;

    /**
     * @OA\Property(
     *     title="Client",
     *     description="Client solicited to the DocumentRequest",
     *     ref="#/components/schemas/UserResponse"
     * )
     */
    public UserResponse $client;

    /**
     * @OA\Property(
     *     title="Requested Documents",
     *     description="List of requested documents")
     */
    public DocumentRequestDoc $requested_documents;

    /**
     * @OA\Property(
     *     title="Created At",
     *     description="DocumentRequest creation timestamp",
     *     example="2024-02-20T23:39:20.000000Z"
     * )
     */
    public string $created_at;

    /**
     * @OA\Property(
     *     title="Updated At",
     *     description="DocumentRequest update timestamp",
     *     example="2024-02-20T23:39:20.000000Z"
     * )
     */
    public string $updated_at;
}
