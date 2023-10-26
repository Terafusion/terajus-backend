<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Address\AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'nif_number' => $this->nif_number,
            'marital_status' => $this->marital_status,
            'registration_number' => $this->registration_number,
            'occupation' => $this->occupation,
            'address' => new AddressResource($this->address),
            'access_token' => isset($this->getAppends()['access_token']) ? $this->getAppends()['access_token'] : null
        ];
    }
}
