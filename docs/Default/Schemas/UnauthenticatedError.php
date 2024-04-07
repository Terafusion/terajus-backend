<?php

namespace Docs\Default\Schemas;

/**
 * @OA\Schema()
 */
class UnauthenticatedError
{
    /**
     * @OA\Property()
     */
    public string $message;
}
