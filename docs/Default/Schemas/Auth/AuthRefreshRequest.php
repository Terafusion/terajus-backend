<?php

namespace Docs\Default\Schemas\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  required={
 *      "grant_type",
 *      "client_id",
 *      "client_secret",
 *      "refresh_token"
 *  }
 * )
 */
class AuthRefreshRequest
{
    /**
     * @OA\Property(default="refresh_token")
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
    public string $refresh_token;
}
