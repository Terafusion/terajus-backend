<?php

namespace Docs\Default\Schemas\DocumentRequest;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class DocumentRequest
{
    /**
     * @OA\Property()
     */
    public int $id;

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
}
