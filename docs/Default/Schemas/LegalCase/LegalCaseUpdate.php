<?php

namespace Docs\Default\Schemas\LegalCase;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class LegalCaseUpdate
{
     /**
     * @OA\Property()
     */
    public string $court;

    /**
     * @OA\Property()
     */
    public string $status;

    /**
     * @OA\Property()
     */
    public string $fields_of_law;

    /**
     * @OA\Property()
     */
    public string $case_matter;

    /**
     * @OA\Property()
     */
    public string $case_type;

    /**
     * @OA\Property()
     */
    public string $case_description;
}
