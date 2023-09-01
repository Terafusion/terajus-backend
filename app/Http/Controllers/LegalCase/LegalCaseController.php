<?php

namespace App\Http\Controllers\LegalCase;

use App\Http\Controllers\Controller;
use App\Http\Requests\LegalCase\LegalCaseStoreRequest;
use App\Http\Requests\LegalCase\LegalCaseUpdateRequest;
use App\Http\Resources\LegalCase\LegalCaseResource;
use App\Models\LegalCase\LegalCase;
use App\Services\LegalCase\LegalCaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LegalCaseController extends Controller
{
    /** @var LegalCaseService */
    private $legalCaseService;

    public function __construct(LegalCaseService $legalCaseService)
    {
        $this->legalCaseService = $legalCaseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LegalCaseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LegalCaseStoreRequest $request)
    {
        return $this->showOne($this->legalCaseService->store($request->validated(), $request->user()), Response::HTTP_CREATED, LegalCaseResource::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LegalCase\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function show(LegalCase $legalCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LegalCaseUpdateRequest  $request
     * @param  \App\Models\LegalCase\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function update(LegalCaseUpdateRequest $request, LegalCase $legalCase)
    {
        return $this->showOne($this->legalCaseService->update($request->validated(), $request->user()), Response::HTTP_CREATED, LegalCaseResource::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LegalCase\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegalCase $legalCase)
    {
        //
    }
}
