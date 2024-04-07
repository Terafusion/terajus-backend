<?php

namespace Docs\Default\Http\Controllers\Document;

use OpenApi\Annotations as OA;

class DocumentController
{
    /**
     * @OA\Get(
     *      tags={"Documents"},
     *      path="/documents",
     *      summary="Get all documents",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *                  type="array",
     *
     *                  @OA\Items(ref="#/components/schemas/DocumentResource")
     *              )
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
    public function index()
    {
    }

    /**
     * @OA\Post(
     *      tags={"Documents"},
     *      path="/documents",
     *      summary="Create a new document",
     *
     *      @OA\RequestBody(
     *          description="",
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/DocumentCreate")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(ref="#/components/schemas/DocumentResource")
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
    public function store()
    {
    }

    /**
     * @OA\Get(
     *      tags={"Documents"},
     *      path="/documents/{document_id}",
     *      summary="Get a document",
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="document_id",
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
     *              @OA\Schema(ref="#/components/schemas/DocumentResponse")
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
     * @OA\Delete(
     *      tags={"Documents"},
     *      path="/documents/{document_id}",
     *      summary="Delete a document",
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="document_id",
     *          description="",
     *          required=true,
     *
     *          @OA\Schema(
     *              type="integer"
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
    public function delete()
    {
    }

    /**
     * @OA\Get(
     *      tags={"Documents"},
     *      path="/documents/{document_id}/download",
     *      summary="Download a document",
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="document_id",
     *          description="ID of the document",
     *          required=true,
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success - File download"
     *      ),
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
    public function download()
    {
    }
}
