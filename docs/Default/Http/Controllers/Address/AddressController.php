<?php

namespace Docs\Default\Http\Controllers\Address;

use OpenApi\Annotations as OA;

class AddressController
{

    /**
     * @OA\Put(
     *      tags={"Addresses"},
     *      path="/addresses/{address_id}",
     *      summary="Update a address",
     *      @OA\RequestBody(
     *          description="",
     *          @OA\JsonContent(ref="#/components/schemas/AddressUpdate"),
     *      ),
     *      @OA\Parameter(
     *          in="header",
     *          name="Authorization",
     *          description="Bearer Token",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          in="path",
     *          name="address_id",
     *          description="",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/AddressResource")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/Unprocessable")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="message",
     *                      type="string"
     *                  ),
     *                  example={"message": "Internal Error"}
     *              )
     *          )
     *      )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Get(
     *      tags={"Addresses"},
     *      path="/addresses",
     *      summary="Get all addresses",
     *      @OA\Parameter(
     *          in="header",
     *          name="Authorization",
     *          description="Bearer Token",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          in="query",
     *          name="filter",
     *          @OA\Schema(
     *              type="array",
     *              example="filter[addressable_id]=2",
     *              @OA\Items(
     *                  type="string",
     *                  enum={"id", "addressable_type", "addressable_id"},
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/AddressResource")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="message",
     *                      type="string"
     *                  ),
     *                  example={"message": "Internal Error"}
     *              )
     *          )
     *      )
     * )
     */
    public function index()
    {
    }

    /**
     * @OA\Get(
     *      tags={"Addresses"},
     *      path="/addresses/{address_id}",
     *      summary="Get a address",
     *      @OA\Parameter(
     *          in="header",
     *          name="Authorization",
     *          description="Bearer Token",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          in="path",
     *          name="address_id",
     *          description="",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/Address")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="message",
     *                      type="string"
     *                  ),
     *                  example={"message": "Internal Error"}
     *              )
     *          )
     *      )
     * )
     */
    public function show()
    {
    }

    /**
 * @OA\Post(
 *      tags={"Addresses"},
 *      path="/addresses",
 *      summary="Create a new address",
 *      @OA\RequestBody(
 *          description="Address data",
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/AddressCreate")
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(ref="#/components/schemas/AddressResource")
 *          )
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Unprocessable Entity",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(ref="#/components/schemas/Unprocessable")
 *          )
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal Error",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="message",
 *                      type="string"
 *                  ),
 *                  example={"message": "Internal Error"}
 *              )
 *          )
 *      )
 * )
 */
public function store()
{
}
}
