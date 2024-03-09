<?php

namespace Docs\Default\Schemas\Customer;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  required={
 *      "name",
 *      "email",
 *      "nif_number",
 *      "person_type",
 *      "marital_status",
 *      "password",
 *      "password_confirmation"
 *  }
 * )
 */
class CustomerCreate
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
     * @OA\Property(example="PERSONAL")
     */
    public string $person_type;

    /**
     * @OA\Property(example="CASADO")
     */
    public string $marital_status;

    /**
     * @OA\Property(minimum="8", maximum="25", contains="[A-Z],[#?!@$%&*=_]")
     */
    public string $password;

    /**
     * @OA\Property(minimum="8", maximum="25", contains="[A-Z],[#?!@$%&*=_]")
     */
    public string $password_confirmation;
}
