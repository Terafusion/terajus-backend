<?php

namespace App\Http\Resources\Customer;

use App\Http\Resources\Address\AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'occupation' => $this->occupation,
            'nif_number' => $this->nif_number,
            'registration_number' => $this->registration_number,
            'marital_status' => $this->marital_status,
            'gender' => $this->gender,
            'person_type' => $this->person_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'addresses' => AddressResource::collection($this->addresses),
        ];
    }
}
