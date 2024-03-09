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
 * 
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
     * @OA\Property()
     */
    public bool $customer;

    /**
     * @OA\Property(example="CPF or CNPJ")
     */
    public string $nif_number;

    /**
     * @OA\Property(example="PERSONAL || BUSINESS")
     */
    public string $person_type;

    /**
     * @OA\Property(example="lawyer || customer")
     */
    public string $role;

    /**
     * @OA\Property(minimum="8", maximum="25", contains="[A-Z],[#?!@$%&*=_]")
     */
    public string $password;
}
