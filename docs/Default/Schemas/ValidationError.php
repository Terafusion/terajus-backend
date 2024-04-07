<?php

namespace Docs\Default\Schemas;

/**
 * @OA\Schema()
 */
class ValidationError
{
    /**
     * @OA\Property()
     */
    public string $message;

    /**
     * @OA\Property(example={"field_name"={"The 'field name' field is required.", "..."}})
     */
    public object $errors;
}
