<?php

namespace Docs\Default\Schemas\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
*/
class AuthCreateResponse
{
    /**
     * @OA\Property()
     */
    public int $id;
    
    /**
     * @OA\Property()
     */
    public string $access_token;

    /**
     * @OA\Property()
     */
    public string $name;

    /**
     * @OA\Property()
     */
    public string $email;
}

