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
    public function __construct(private LegalCaseService $legalCaseService)
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
        return $this->showAll($this->legalCaseService->getAll($request->user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LegalCaseStoreRequest $request)
    {
        $this->authorize('create', LegalCase::class);

        return $this->showOne($this->legalCaseService->store($request->validated(), $request->user()), Response::HTTP_CREATED, LegalCaseResource::class);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(LegalCase $legalCase)
    {
        $this->authorize('view', $legalCase);

        return $this->showOne($legalCase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(LegalCaseUpdateRequest $request, LegalCase $legalCase)
    {
        $this->authorize('update', $legalCase);

        return $this->showOne($this->legalCaseService->update($request->validated(), $legalCase), Response::HTTP_OK, LegalCaseResource::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegalCase $legalCase)
    {
        //
    }
}
