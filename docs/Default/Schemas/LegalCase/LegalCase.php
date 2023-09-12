<?php

namespace Docs\Default\Schemas\LegalCase;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class LegalCase
{
    /**
     * @OA\Property()
     */
    public int $user_id;


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
    public string $complaint;
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

    /**
     * @OA\Property()
     */
    public string $case_requests;

    /**
     * @OA\Property()
     */
    public bool $pending_protocol;
}
