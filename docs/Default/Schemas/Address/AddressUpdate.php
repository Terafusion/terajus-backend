<?php

namespace Docs\Default\Schemas\Address;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={
 *  "street",
 *  "number",
 *  "district",
 *  "city",
 *  "country",
 *  "zip_code",
 *
 * }))
 */
class AddressUpdate
{
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
