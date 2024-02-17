<?php

namespace Docs\Default\Schemas\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  required={
 *      "name",
 *      "email",
 *      "nif_number",
 *      "person_type",
 *      "role",
 *      "password",
 *      "password_confirmation"
 *  }
 * )
 */
class AuthCreate
{
    /**
     * @OA\Property(maximum="255")
     */
    public string $name;

    /**
     * @OA\Property()
     */
    public string $email;

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

    /**
     * @OA\Property(minimum="8", maximum="25", contains="[A-Z],[#?!@$%&*=_]")
     */
    public string $password_confirmation;
}
