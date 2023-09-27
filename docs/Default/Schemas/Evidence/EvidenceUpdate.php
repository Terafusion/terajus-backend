<?php

namespace Docs\Default\Schemas\Evidence;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class EvidenceUpdate
{
    /**
     * @OA\Property()
     */
    public int $legal_case_id;

    /**
     * @OA\Property()
     */
    public string $description;
}
