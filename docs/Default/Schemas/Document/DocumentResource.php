<?php

namespace Docs\Default\Schemas\Document;

/**
 * @OA\Schema(
 *     title="Document Resource",
 *     description="Document resource representation",
 * )
 */
class DocumentResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data property containing the document resource",
     *     ref="#/components/schemas/DocumentResponse"
     * )
     */
    public DocumentResponse $data;

    /**
     * @OA\Property(
     *     title="Status Code",
     *     description="HTTP status code",
     *     example=200
     * )
     */
    public int $statusCode;
}
