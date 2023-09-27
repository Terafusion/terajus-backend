<?php

namespace Docs\Default\Schemas\Evidence;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={
 * "legal_case_id", 
 * "description"
 * }))
 */
class EvidenceCreate
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
