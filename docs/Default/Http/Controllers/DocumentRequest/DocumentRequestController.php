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
     *
     *      @OA\RequestBody(
     *          description="",
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/DocumentRequestCreate"),
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(ref="#/components/schemas/DocumentRequestResource")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=409,
     *          description="Conflict",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(ref="#/components/schemas/RequestException")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Invalid input",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(ref="#/components/schemas/Unprocessable")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
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

    /**
     * @OA\Get(
     *      tags={"Document Requests"},
     *      path="/document-requests/{document_request_id}",
     *      summary="Get a document request",
     *
     *      @OA\Parameter(
     *          in="header",
     *          name="Authorization",
     *          description="Bearer Token",
     *          required=true,
     *
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="document_request_id",
     *          description="",
     *          required=true,
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(ref="#/components/schemas/DocumentRequestResource")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
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
     * @OA\Put(
     *      tags={"Document Requests"},
     *      path="/document-requests/{document_request_id}",
     *      summary="Update a document request",
     *
     *      @OA\RequestBody(
     *          description="",
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/DocumentRequestUpdate")
     *      ),
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="DocumentRequest ID",
     *          required=true,
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(ref="#/components/schemas/DocumentRequestResponse")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(ref="#/components/schemas/Unprocessable")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
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
    public function update($id)
    {
    }
}
