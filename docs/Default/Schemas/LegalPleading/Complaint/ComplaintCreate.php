<?php

namespace Docs\Default\Schemas\LegalPleading\Complaint;

use Docs\Default\Schemas\Lawyer\Lawyer;
use Docs\Default\Schemas\CustomerCreate\CustomerCreate;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  required={
 *      "slug",
 *      "lawyers",
 *      "plaintiffs",
 *      "defendants",
 *      "claim",
 *      "case_type",
 *      "case_matter",
 *      "court",
 *      "fields_of_law"
 *  }
 * )
 */
class ComplaintCreate
{
    /**
     * @OA\Property(example="COMPLAINT")
     */
    public string $slug;
    /**
     * @OA\Property(
     *     type="array",
     *     @OA\Items(type="integer", format="int64", description="User ID (lawyer)")
     * )
     * @example [1, 2, 3]
     */
    public array $lawyers;

    /**
     * @OA\Property(
     *     type="array",
     *     @OA\Items(type="integer", format="int64", description="Customer ID (plaintiff)")
     * )
     * @example [4, 5, 6]
     */
    public array $plaintiffs;

    /**
     * @OA\Property(
     *     type="array",
     *     @OA\Items(type="integer", format="int64", description="Customer ID (defendant)")
     * )
     * @example [7, 8, 9]
     */
    public array $defendants;

    /**
     * @OA\Property(example="Recisão")
     */
    public string $case_type;

    /**
     * @OA\Property(example="Justa Causa/Falta Grave")
     */
    public string $case_matter;

    /**
     * @OA\Property(example="TJSP")
     */
    public string $court;

    /**
     * @OA\Property(example="Direito do Trabalho")
     */
    public string $fields_of_law;

    /**
     * @OA\Property()
     */
    public string $claim;
}