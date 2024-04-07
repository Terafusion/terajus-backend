<?php

namespace Docs\Default\Http\Controllers\Customer;

use OpenApi\Annotations as OA;

class CustomerController
{
    /**
     * @OA\Get(
     *      path="/api/customers",
     *      summary="Get all customers",
     *      tags={"Customer"},
     *
     *      @OA\Response(
     *          response=200,
     *          description="List of customers",
     *
     *          @OA\JsonContent(
     *              type="array",
     *
     *              @OA\Items(ref="#/components/schemas/CustomerResource")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *
     *          @OA\JsonContent(ref="#/components/schemas/UnauthenticatedError")
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenError")
     *      )
     * )
     */
    public function index()
    {
    }

    /**
     * @OA\Get(
     *      path="/api/customers/{id}",
     *      summary="Get a specific customer",
     *      tags={"Customer"},
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          description="Customer ID",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Customer details",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CustomerResponse")
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *
     *          @OA\JsonContent(ref="#/components/schemas/UnauthenticatedError")
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenError")
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Customer not found",
     *
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundError")
     *      )
     * )
     */
    public function show($id)
    {
    }

    /**
     * @OA\Post(
     *      path="/api/customers",
     *      summary="Create a new customer",
     *      tags={"Customer"},
     *
     *      @OA\RequestBody(
     *          description="Customer data",
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/CustomerCreate")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Customer created successfully",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CustomerResponse")
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *
     *          @OA\JsonContent(ref="#/components/schemas/UnauthenticatedError")
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenError")
     *      ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ValidationError")
     *      )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *      path="/api/customers/{id}",
     *      summary="Update a customer",
     *      tags={"Customer"},
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          description="Customer ID",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          description="Customer data",
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/CustomerUpdate")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Customer updated successfully",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CustomerResponse")
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *
     *          @OA\JsonContent(ref="#/components/schemas/UnauthenticatedError")
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenError")
     *      ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ValidationError")
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Customer not found",
     *
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundError")
     *      )
     * )
     */
    public function update($id)
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/customers/{id}",
     *      summary="Delete a customer",
     *      tags={"Customer"},
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          description="Customer ID",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Customer deleted successfully",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Success"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *
     *          @OA\JsonContent(ref="#/components/schemas/UnauthenticatedError")
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenError")
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Customer not found",
     *
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundError")
     *      )
     * )
     */
    public function destroy($id)
    {
    }
}
