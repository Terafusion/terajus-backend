<?php

namespace Docs\Default\Schemas\Evidence;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class Evidence
{
    /**
     * @OA\Property()
     */
    public int $id;

    /**
     * @OA\Property()
     */
    public int $legal_case_id;

    /**
     * @OA\Property()
     */
    public string $legal_case_reference;

    /**
     * @OA\Property()
     */
    public string $description;
}
