<?php

namespace Docs\Default\Schemas\User;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User resource representation",
 *
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class UserResponse
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="User ID",
     *     format="int64"
     * )
     */
    public int $id;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="User's name",
     *     example="Casado"
     * )
     */
    public string $name;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="User's email address",
     *     example="casado@terafusion.com.br"
     * )
     */
    public string $email;

    /**
     * @OA\Property(
     *     title="Roles",
     *     description="User roles",
     *     type="array",
     *
     *     @OA\Items(
     *         type="object",
     *
     *         @OA\Property(
     *             property="id",
     *             type="integer",
     *             example="3"
     *         ),
     *         @OA\Property(
     *             property="name",
     *             type="string",
     *             example="customer"
     *         ),
     *         @OA\Property(
     *             property="guard_name",
     *             type="string",
     *             example="api"
     *         )
     *     )
     * )
     **/
    public array $roles;

    /**
     * @OA\Property(
     *     title="Occupation",
     *     description="User's occupation",
     *     example=null
     * )
     */
    public ?string $occupation;

    /**
     * @OA\Property(
     *     title="NIF Number",
     *     description="User's NIF number",
     *     example="54966687112"
     * )
     */
    public string $nif_number;

    /**
     * @OA\Property(
     *     title="Registration Number",
     *     description="User's registration number",
     *     example=null
     * )
     */
    public ?string $registration_number;

    /**
     * @OA\Property(
     *     title="Marital Status",
     *     description="User's marital status",
     *     example="CASADO"
     * )
     */
    public string $marital_status;

    /**
     * @OA\Property(
     *     title="Gender",
     *     description="User's gender",
     *     example=null
     * )
     */
    public ?string $gender;

    /**
     * @OA\Property(
     *     title="Person Type",
     *     description="User's person type",
     *     example="PERSONAL"
     * )
     */
    public string $person_type;

    /**
     * @OA\Property(
     *     title="Created At",
     *     description="User creation timestamp",
     *     example="2024-02-18T19:53:30.000000Z"
     * )
     */
    public string $created_at;

    /**
     * @OA\Property(
     *     title="Updated At",
     *     description="User update timestamp",
     *     example="2024-02-18T19:53:30.000000Z"
     * )
     */
    public string $updated_at;

    /**
     * @OA\Property(
     *     title="Access Token",
     *     description="User access token",
     *     example=null
     * )
     */
    public ?string $access_token;

    /**
     * @OA\Property(
     *     title="Addresses",
     *     description="User addresses",
     *     type="array",
     *
     *     @OA\Items(ref="#/components/schemas/Address")
     * )
     */
    public array $addresses;
}
