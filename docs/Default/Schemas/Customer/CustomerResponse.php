<?php

namespace Docs\Default\Schemas\Customer;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class CustomerResponse
{
    /**
     * @OA\Property()
     */
    public int $id;

    /**
     * @OA\Property()
     */
    public string $name;

    /**
     * @OA\Property()
     */
    public string $email;

    /**
     * @OA\Property()
     */
    public ?string $occupation;

    /**
     * @OA\Property()
     */
    public string $nif_number;

    /**
     * @OA\Property()
     */
    public ?string $registration_number;

    /**
     * @OA\Property()
     */
    public ?string $marital_status;

    /**
     * @OA\Property()
     */
    public ?string $gender;

    /**
     * @OA\Property()
     */
    public string $person_type;

    /**
     * @OA\Property()
     */
    public string $created_at;

    /**
     * @OA\Property()
     */
    public string $updated_at;
}
