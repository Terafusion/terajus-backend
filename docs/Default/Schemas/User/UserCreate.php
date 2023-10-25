<?php

namespace Docs\Default\Schemas\User;

use Docs\Default\Schemas\Address\AddressCreate;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={
 *  "name",
 *  "email",
 *  "person_type",
 *  "nif_number",
 *  "registration_number"}))
 */
class UserCreate
{
    /**
     * @OA\Property(maximum="255")
     */
    public string $name;

    /**
     * @OA\Property(maximum="255")
     */
    public string $email;

    /**
     * @OA\Property(example="CPF || CNPJ")
     */
    public string $nif_number;

    /**
     * @OA\Property(example="RG pessoa física")
     */
    public string $registration_number;

    /**
     * @OA\Property(example="PERSONAL || BUSINESS")
     */
    public string $person_type;

    /**
     * @OA\Property(maximum="255")
     */
    public string $occupation;

    /**
     * @OA\Property()
     */
    public AddressCreate $address;
}
