<?php

namespace Docs\Default\Schemas\Customer;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  required={
 *      "name",
 *      "email",
 *      "password",
 *      "nif_number",
 *      "person_type",
 *      "marital_status",
 *      "is_customer"
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
     * @OA\Property(type="boolean")
     */
    public bool $is_customer;
}
