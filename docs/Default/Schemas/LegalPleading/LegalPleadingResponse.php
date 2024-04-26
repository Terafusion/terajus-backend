<?php

namespace Docs\Default\Schemas\LegalPleading;

use Docs\Default\Schemas\Lawyer\Lawyer;
use Docs\Default\Schemas\Customer\Customer;
use Docs\Default\Schemas\Customer\CustomerResponse;
use Docs\Default\Schemas\User\User;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class LegalPleadingResponse
{
    /**
     * @OA\Property(
     *     title="tenant_id",
     *     description="Tenant ID",
     *     format="int64",
     *     example=2
     * )
     *
     * @var int
     */
    public int $tenant_id;

    /**
     * @OA\Property(
     *     title="uuid",
     *     description="UUID",
     *     format="string",
     *     example="24343523-b08d-4d05-8c95-cef2ef40e6c1"
     * )
     *
     * @var string
     */
    public string $uuid;

    /**
     * @OA\Property()
     */
    public string $content;

    /**
     * @OA\Property()
     */
    public User $lawyer;

    /**
     * @OA\Property()
     */
    public CustomerResponse $plaintiff;

    /**
     * @OA\Property()
     */
    public CustomerResponse $defendant;

    /**
     * @OA\Property()
     */
    public int $prompt_word_count;

    /**
     * @OA\Property()
     */
    public int $ia_response_word_count;

    /**
     * @OA\Property()
     */
    public string $prompt_text;

    /**
     * @OA\Property(
     *     title="updated_at",
     *     description="Updated at",
     *     format="date-time",
     *     example="2024-04-03T21:06:35.119000Z"
     * )
     *
     * @var string
     */
    public string $updated_at;

    /**
     * @OA\Property(
     *     title="created_at",
     *     description="Created at",
     *     format="date-time",
     *     example="2024-04-03T21:06:35.119000Z"
     * )
     *
     * @var string
     */
    public string $created_at;
}