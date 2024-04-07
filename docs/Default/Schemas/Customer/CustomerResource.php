<?php

namespace Docs\Default\Schemas\Customer;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class CustomerResource
{
    /**
     * @OA\Property()
     */
    public CustomerResponse $data;

    /**
     * @OA\Property(example="integer")
     */
    public int $statusCode;
}
