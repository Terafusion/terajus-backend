<?php

namespace Docs\Default\Schemas\Document;

/**
 * @OA\Schema(
 *     title="Document Create",
 *     description="Document creation schema",
 *     required={"file", "model_type", "model_id"},
 *     @OA\Property(
 *         property="file",
 *         type="string",
 *         format="binary",
 *         description="File to be attached"
 *     ),
 *     @OA\Property(
 *         property="model_type",
 *         type="string",
 *         description="Model type associated with the document"
 *     ),
 *     @OA\Property(
 *         property="model_id",
 *         type="integer",
 *         format="int64",
 *         description="Model ID associated with the document"
 *     ),
 * )
 */
class DocumentCreate
{
    public string $file;
    public string $model_type;
    public int $model_id;
}
