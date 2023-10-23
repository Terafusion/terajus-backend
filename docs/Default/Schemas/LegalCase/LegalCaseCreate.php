<?php

namespace Docs\Default\Schemas\LegalCase;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={
 * "case_type", 
 * "case_matter",
 * "case_description"
 * }))
 */
class LegalCaseCreate
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

    /**
     * @OA\Property(
     *     type="array",
     *     @OA\Items(
     *         @OA\Property(
     *             property="participant_type_id",
     *             type="integer",
     *             example="1 para parte ativa, 2 para parte passiva"
     *         )
     *     )
     * )
     */
    public array $participants;


}
