<?php

namespace Docs\Default\Schemas\DocumentRequest;

use Docs\Default\Schemas\DocumentRequestDoc\DocumentRequestDoc;
use Docs\Default\Schemas\User\User;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class DocumentRequestResponse
{
    /**
     * @OA\Property()
     */
    public int $id;

    /**
     * @OA\Property(example="PENDING, FINISHED")
     */
    public string $status;

    /**
     * @OA\Property()
     */
    public int $user_id;

    /**
     * @OA\Property()
     */
    public int $client_id;

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
    public User $user;

    /**
     * @OA\Property()
     */
    public User $client;

    /**
     * @OA\Property()
     */
    public DocumentRequestDoc $requested_documents;
}
