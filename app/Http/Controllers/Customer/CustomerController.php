<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\Customer\CustomerStoreRequest;
use App\Models\Customer\Customer;
use App\Services\Customer\CustomerService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{

    public function __construct(private CustomerService $customerService)
    {
        //$this->middleware('can:user.store')->only('store');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->showAll($this->customerService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        return $this->showOne($this->customerService->store($request->validated()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $this->authorize('view', $customer);
        return $this->showOne($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerUpdateRequest $request
     * @param  \App\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $this->authorize('update', $customer);
        return $this->showOne($this->customerService->update($request->validated(), $customer), Response::HTTP_OK);
    }

    /**
     *
     * @param  \App\Models\Customer\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        return $this->showMessage('Success');
    }

    public function me()
    {
        return $this->showOne(auth()->user());
    }
}
