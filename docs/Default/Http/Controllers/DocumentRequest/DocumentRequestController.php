<?php

namespace Docs\Default\Http\Controllers\DocumentRequest;

use OpenApi\Annotations as OA;

class DocumentRequestController
{
    /**
     * @OA\Post(
     *      tags={"Document Requests"},
     *      path="/document-requests",
     *      summary="Add a new document request register",
     *      @OA\RequestBody(
     *          description="",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/DocumentRequestCreate"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/DocumentRequestResource")
     *          )
     *      ),
     *      @OA\Response(
     *          response=409,
     *          description="Conflict",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/RequestException")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid input",
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
