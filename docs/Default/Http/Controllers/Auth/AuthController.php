<?php

namespace Docs\Default\Http\Controllers\Auth;

use OpenApi\Annotations as OA;

class AuthController
{
   /**
    * @OA\Post(
    *      path="/oauth/token",
    *      summary="Generate or refresh authentication token",
    *      tags={"Authentication"},
    *      @OA\RequestBody(
    *          description="",
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/AuthPasswordRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="User successfully authenticated",
    *          @OA\JsonContent(
    *               ref="#/components/schemas/AuthResponse"
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
   public function authenticatePassword()
   {
   }

      /**
    * @OA\Post(
    *      path="/oauth/signup",
    *      summary="Register an User",
    *      tags={"Authentication"},
    *      @OA\RequestBody(
    *          description="",
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/AuthCreate")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="User successfully authenticated",
    *          @OA\JsonContent(
    *               ref="#/components/schemas/AuthCreateResponse"
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
    public function signUp()
    {
    }
 

   /**
    * @OA\Delete(
    *      path="/oauth/tokens/{token_id}",
    *      summary="Revoke access token",
    *      tags={"Authentication"},
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
    *          name="token_id",
    *          description="Token id",
    *          required=true,
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Response(
    *          response=204,
    *          description="Success",
    *          @OA\MediaType(
    *              mediaType="application/json",
    *              @OA\Schema(
    *                  example={}
    *              )
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
   public function revokeToken()
   {
   }
}
