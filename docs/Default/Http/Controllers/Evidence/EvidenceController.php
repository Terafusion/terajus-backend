<?php

namespace Docs\Default\Http\Controllers\Evidence;

use OpenApi\Annotations as OA;

class EvidenceController
{
    /**
     * @OA\Post(
     *      tags={"Evidences"},
     *      path="/evidences",
     *      summary="Add a new evidence register",
     *      @OA\RequestBody(
     *          description="",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EvidenceCreate"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/EvidenceResource")
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

    // /**
    //  * @OA\Put(
    //  *      tags={"Evidences"},
    //  *      path="/evidences/{evidence_id}",
    //  *      summary="Update a evidence",
    //  *      @OA\RequestBody(
    //  *          description="",
    //  *          @OA\JsonContent(ref="#/components/schemas/EvidenceUpdate"),
    //  *      ),
    //  *      @OA\Parameter(
    //  *          in="header",
    //  *          name="Authorization",
    //  *          description="Bearer Token",
    //  *          required=true,
    //  *          @OA\Schema(
    //  *              type="string"
    //  *          )
    //  *      ),
    //  *      @OA\Parameter(
    //  *          in="path",
    //  *          name="evidence_id",
    //  *          description="",
    //  *          required=true,
    //  *          @OA\Schema(
    //  *              type="integer"
    //  *          )
    //  *      ),
    //  *      @OA\Response(
    //  *          response=200,
    //  *          description="Success",
    //  *          @OA\MediaType(
    //  *              mediaType="application/json",
    //  *              @OA\Schema(ref="#/components/schemas/EvidenceResource")
    //  *          )
    //  *      ),
    //  *      @OA\Response(
    //  *          response=422,
    //  *          description="Unprocessable Entity",
    //  *          @OA\MediaType(
    //  *              mediaType="application/json",
    //  *              @OA\Schema(ref="#/components/schemas/Unprocessable")
    //  *          )
    //  *      ),
    //  *      @OA\Response(
    //  *          response=500,
    //  *          description="Internal Error",
    //  *          @OA\MediaType(
    //  *              mediaType="application/json",
    //  *              @OA\Schema(
    //  *                  @OA\Property(
    //  *                      property="message",
    //  *                      type="string"
    //  *                  ),
    //  *                  example={"message": "Internal Error"}
    //  *              )
    //  *          )
    //  *      )
    //  * )
    //  */
    // public function update()
    // {
    // }

    /**
     * @OA\Get(
     *      tags={"Evidences"},
     *      path="/evidences",
     *      summary="Get all evidences",
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
     *              @OA\Schema(ref="#/components/schemas/EvidenceResource")
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
     *      tags={"Evidences"},
     *      path="/evidences/{evidence_id}",
     *      summary="Get a evidence",
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
     *          name="evidence_id",
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
     *              @OA\Schema(ref="#/components/schemas/Evidence")
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
}
