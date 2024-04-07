<?php

namespace Docs\Default\Schemas\Address;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class AddressResource
{
    /**
     * @OA\Property()
     */
    public Address $data;

    /**
     * @OA\Property(example="integer")
     */
    public int $statusCode;
}
