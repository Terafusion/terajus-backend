<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressStoreRequest;
use App\Http\Requests\Address\AddressUpdateRequest;
use App\Http\Resources\Address\AddressResource;
use App\Services\Address\AddressService;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    public function __construct(private AddressService $addressService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll($this->addressService->getAll(), Response::HTTP_OK, AddressResource::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne($this->addressService->getById($id), Response::HTTP_OK, AddressResource::class);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AddressStoreRequest $request)
    {
        return $this->showOne($this->addressService->store($request->validated(), $request->user()), Response::HTTP_CREATED, AddressResource::class);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AddressUpdateRequest $request, int $id)
    {
        return $this->showOne($this->addressService->update($request->validated(), $id), Response::HTTP_CREATED, AddressResource::class);
    }
}
