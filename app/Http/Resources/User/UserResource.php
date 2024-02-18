<?php

namespace App\Http\Resources\User;

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
            'roles' => $this->roles,
            'occupation' => $this->occupation,
            'registration_number' => $this->registration_number,
            'maritial_status' => $this->maritial_status,
            'gender' => $this->gender,
            'person_type' => $this->person_type,
            'access_token' => isset($this->getAppends()['access_token']) ? $this->getAppends()['access_token'] : null
        ];
    }
}
