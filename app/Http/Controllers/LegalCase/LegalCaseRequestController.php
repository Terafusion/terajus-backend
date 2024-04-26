<?php

namespace App\Http\Controllers\LegalCase;

use App\Http\Controllers\Controller;
use App\Http\Requests\LegalCase\LegalCaseRequestStoreRequest;
use App\Models\LegalCase\LegalCaseRequest;
use App\Services\LegalCase\LegalCaseRequestService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LegalCaseRequestController extends Controller
{
    public function __construct(private LegalCaseRequestService $legalCaseRequestService)
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
        return $this->showAll($this->legalCaseRequestService->getAll($request->user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LegalCaseRequestStoreRequest $request)
    {
        //$this->authorize('create', LegalCase::class);

        return $this->showOne($this->legalCaseRequestService->store($request->validated(), $request->user()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(LegalCaseRequest $legalCaseRequest)
    {
        $this->authorize('view', $legalCaseRequest);

        return $this->showOne($legalCaseRequest);
    }
}
