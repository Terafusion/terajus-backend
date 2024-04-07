<?php

namespace App\Http\Controllers\LegalPleadingType;

use App\Http\Controllers\Controller;
use App\Services\LegalPleadingType\LegalPleadingTypeService;

class LegalPleadingTypeController extends Controller
{
    public function __construct(private LegalPleadingTypeService $LegalPleadingTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll($this->LegalPleadingTypeService->getAll());
    }
}
