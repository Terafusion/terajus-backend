<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\DocumentStoreRequest;
use App\Models\Document\Document;
use App\Services\Document\DocumentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentController extends Controller
{
    public function __construct(private DocumentService $documentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->showAll($this->documentService->getAll($request->user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentStoreRequest $request)
    {
        return $this->showOne($this->documentService->store($request->validated(), $request->user()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return $this->showOne($document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentUpdateRequest $request, Document $document)
    {
        //return $this->showOne($this->documentService->update($request->validated(), $document->id), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    public function download(Document $document)
    {
        return $this->documentService->download($document);
    }
}
