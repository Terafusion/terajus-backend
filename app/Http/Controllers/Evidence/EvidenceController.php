<?php

namespace App\Http\Controllers\Evidence;

use App\Http\Controllers\Controller;
use App\Http\Requests\Evidence\EvidenceStoreRequest;
use App\Services\Evidence\EvidenceService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EvidenceController extends Controller
{

    public function __construct(private EvidenceService $evidenceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll($this->evidenceService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EvidenceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvidenceStoreRequest $request)
    {
        return $this->showOne($this->evidenceService->store($request->validated()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne($this->evidenceService->getById($id));
    }

    /**
     * Destroy an evidence
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->evidenceService->delete($id);
        return $this->showMessage('Success');
    }
}
