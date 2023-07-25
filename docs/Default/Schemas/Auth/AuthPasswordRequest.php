<?php

namespace Docs\Default\Schemas\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  required={
 *      "grant_type",
 *      "client_id",
 *      "client_secret",
 *      "username",
 *      "password"
 *  }
 * )
 */
class AuthPasswordRequest
{
    /**
     * @OA\Property(default="password")
     */
    public string $grant_type;

    /**
     * @OA\Property()
     */
    public string $client_id;

    /**
     * @OA\Property()
     */
    public string $client_secret;

    /**
     * @OA\Property()
     */
    public string $username;

    /**
     * @OA\Property()
     */
    public string $password;

    /**
     * @OA\Property(example="Only if you want to refresh token. Do not send username and password")
     */
    public string $refresh_token;
}

