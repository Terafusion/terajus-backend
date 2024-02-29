<?php

namespace Docs\Default\Http\Controllers\ParticipantType;

use OpenApi\Annotations as OA;

class ParticipantTypeController
{
    /**
     * @OA\Get(
     *      tags={"ParticipantTypes"},
     *      path="/participant-types",
     *      summary="Get all participant types",
     *      @OA\Parameter(
     *          in="query",
     *          name="type",
     *          description="Filter by participant type",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/ParticipantTypeResource")
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
