<?php

namespace App\Http\Controllers\ParticipantType;

use App\Http\Controllers\Controller;
use App\Services\ParticipantType\ParticipantTypeService;

class ParticipantTypeController extends Controller
{
    public function __construct(private ParticipantTypeService $participantTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll($this->participantTypeService->getAll());
    }
}
