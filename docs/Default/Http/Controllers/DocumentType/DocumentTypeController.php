<?php

namespace Docs\Default\Http\Controllers\DocumentType;

use OpenApi\Annotations as OA;

class DocumentTypeController
{
    /**
     * @OA\Get(
     *      tags={"DocumentTypes"},
     *      path="/document-types",
     *      summary="Get all document types",
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
     *              example="filter[legal_case_id]=2",
     *              @OA\Items(
     *                  type="string",
     *                  enum={"id", "legal_case_id", "description"},
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/DocumentTypeResource")
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
}
