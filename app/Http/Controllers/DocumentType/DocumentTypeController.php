<?php

namespace App\Http\Controllers\DocumentType;

use App\Http\Controllers\Controller;
use App\Models\Document\DocumentType;
use App\Services\Document\DocumentTypeService;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function __construct(private DocumentTypeService $documentTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll($this->documentTypeService->getAll());
    }
}
