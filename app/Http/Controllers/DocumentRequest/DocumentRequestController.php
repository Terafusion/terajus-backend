<?php

namespace App\Http\Controllers\DocumentRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest\DocumentRequestStoreRequest;
use App\Http\Requests\DocumentRequest\DocumentRequestUpdateRequest;
use App\Models\DocumentRequest\DocumentRequest;
use App\Services\DocumentRequest\DocumentRequestService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentRequestController extends Controller
{
    public function __construct(private DocumentRequestService $documentRequestService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->showAll($this->documentRequestService->getAll($request->user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequestStoreRequest $request)
    {
        return $this->showOne($this->documentRequestService->store($request->validated(), $request->user()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentRequest $documentRequest)
    {
        return $this->showOne($documentRequest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequestUpdateRequest $request, DocumentRequest $documentRequest)
    {
        return $this->showOne($this->documentRequestService->update($request->validated(), $documentRequest->id), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentRequest $documentRequest)
    {
        //
    }
}
