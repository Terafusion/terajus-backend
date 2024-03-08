<?php

namespace Docs\Default\Schemas\Customer;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  required={
 *      "name"
 *  }
 * )
 */
class CustomerUpdate
{
    /**
     * @OA\Property(maximum="255")
     */
    public string $name;
}
