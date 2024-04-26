<?php

namespace Docs\Default\Http\Controllers\LegalPleading;

use OpenApi\Annotations as OA;

class LegalPleadingController
{
    /**
     * @OA\Post(
     *      tags={"Legal Pleadings"},
     *      path="/legal-pleadings",
     *      summary="Add a new Legal Pleading register",
     *
     *      @OA\RequestBody(
     *          description="O body irá variar dependendo do tipo (slug) de peça jurídica que será criada.",
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/LegalPleadingCreate"),
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(ref="#/components/schemas/LegalPleadingResponse")
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
     *      tags={"Legal Pleadings"},
     *      path="/legal-pleadings",
     *      summary="List all Legal Pleading registers",
     *      description="Returns a list of Legal Pleading registers. The list can be filtered by id, slug, search (filters by slug), and lawyer (filters by lawyer's nif_number and name).",
     *
     *      @OA\Parameter(
     *          name="filter[slug]",
     *          in="query",
     *          description="Filter by slug",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *
     *      @OA\Parameter(
     *          name="filter[search]",
     *          in="query",
     *          description="Filter by slug",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *
     *      @OA\Parameter(
     *          name="filter[lawyer]",
     *          in="query",
     *          description="Filter by lawyer's nif_number and name",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/LegalPleadingResponse"))
     *      )
     * )
     */
    public function index()
    {
    }

    /**
     * @OA\Get(
     *      tags={"Legal Pleadings"},
     *      path="/legal-pleadings/{uuid}",
     *      summary="Get a Legal Pleading register by its UUID",
     *      description="Returns a single Legal Pleading register",
     *
     *      @OA\Parameter(
     *          name="uuid",
     *          in="path",
     *          description="UUID of the Legal Pleading register",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/LegalPleadingResponse")
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Not Found",
     *          @OA\JsonContent(type="object", @OA\Property(property="message", type="string", example="Not Found"))
     *      )
     * )
     */
    public function show()
    {
    }
}
