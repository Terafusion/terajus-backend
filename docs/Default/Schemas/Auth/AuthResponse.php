<?php

namespace Docs\Default\Schemas\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class AuthResponse
{
    /**
     * @OA\Property()
     */
    public string $access_token;

    /**
     * @OA\Property()
     */
    public string $refresh_token;

    /**
     * @OA\Property()
     */
    public string $token_type;

    /**
     * @OA\Property(example="integer")
     */
    public int $expires_in;

    /**
     * @OA\Property(example="tes*******@test.com")
     */
    public string $email;
}
