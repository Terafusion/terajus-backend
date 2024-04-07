<?php

namespace Docs\Default\Schemas\Address;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class Address
{
    /**
     * @OA\Property()
     */
    public int $id;

    /**
     * @OA\Property()
     */
    public int $addressable_id;

    /**
     * @OA\Property()
     */
    public string $addressable_type;

    /**
     * @OA\Property()
     */
    public string $street;

    /**
     * @OA\Property()
     */
    public string $number;

    /**
     * @OA\Property()
     */
    public string $district;

    /**
     * @OA\Property()
     */
    public string $city;

    /**
     * @OA\Property()
     */
    public string $state;

    /**
     * @OA\Property()
     */
    public string $country;

    /**
     * @OA\Property()
     */
    public string $complement;

    /**
     * @OA\Property()
     */
    public string $zip_code;
}
