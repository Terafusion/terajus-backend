<?php

namespace Docs\Default\Schemas\User;

use Docs\Default\Schemas\Address\Address;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class UserResponse
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
    public string $nif_number;

    /**
     * @OA\Property()
     */
    public string $maritial_status;

    /**
     * @OA\Property()
     */
    public string $registration_number;

    /**
     * @OA\Property()
     */
    public string $occupation;

    /**
     * @OA\Property(example="only if accessing /login")
     */
    public string $access_token;

    /**
     * @OA\Property()
     */
    public Address $address;
}
