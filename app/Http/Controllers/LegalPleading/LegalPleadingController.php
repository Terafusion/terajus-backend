<?php

namespace App\Http\Controllers\LegalPleading;

use App\Http\Controllers\Controller;
use App\Http\Requests\LegalPleading\LegalPleadingStoreRequest;
use App\Http\Requests\LegalPleading\LegalPleadingUpdateRequest;
use App\Http\Resources\LegalPleading\LegalPleadingResource;
use App\Models\LegalPleading\LegalPleading;
use App\Services\LegalPleading\LegalPleadingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LegalPleadingController extends Controller
{
    public function __construct(private LegalPleadingService $legalPleadingService)
    {
        $this->middleware('json.paginate')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->showAll($this->legalPleadingService->getAll($request->user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LegalPleadingStoreRequest $request)
    {
        $this->authorize('create', LegalPleading::class);

        return $this->showOne($this->legalPleadingService->store($request->validated(), $request->user()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(LegalPleading $legalPleading)
    {
        $this->authorize('view', $legalPleading);

        return $this->showOne($legalPleading);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(LegalPleadingStoreRequest $request, LegalPleading $legalPleading)
    {
        $this->authorize('update', $legalPleading);

        return $this->showOne($this->legalPleadingService->update($request->validated(), $legalPleading), Response::HTTP_OK, LegalPleadingResource::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegalPleading $legalPleading)
    {
        //
    }
}
