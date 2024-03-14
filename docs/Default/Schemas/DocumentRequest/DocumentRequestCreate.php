<?php

namespace Docs\Default\Schemas\DocumentRequest;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={
 * "user_id",
 * "documents"
 * }))
 */
class DocumentRequestCreate
{
    /**
     * @OA\Property()
     */
    public int $customer_id;

    /**
     * @OA\Property(
     *     type="array",
     *
     *     @OA\Items(
     *
     *         @OA\Property(
     *             property="document_type_id",
     *             type="integer"
     *         ),
     *         @OA\Property(
     *             property="description",
     *             type="string"
     *         )
     *     )
     * )
     */
    public array $documents;
}
