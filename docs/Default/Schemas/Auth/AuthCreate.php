<?php

namespace Docs\Default\Schemas\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  required={
 *      "name",
 *      "email",
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
     * @OA\Property(minimum="8", maximum="25", contains="[A-Z],[#?!@$%&*=_]")
     */
    public string $password;

    /**
     * @OA\Property(minimum="8", maximum="25", contains="[A-Z],[#?!@$%&*=_]")
     */
    public string $password_confirmation;
}
