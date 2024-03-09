<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Address\AddressResource;
use App\Http\Resources\Role\RoleResource;
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
            'address' => AddressResource::collection($this->address),
            'roles' =>  RoleResource::collection($this->roles),
            'gender' => $this->gender,
            'person_type' => $this->person_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'access_token' => isset($this->getAppends()['access_token']) ? $this->getAppends()['access_token'] : null
        ];
    }
}
