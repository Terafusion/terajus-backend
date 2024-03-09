<?php

namespace App\Http\Requests\User;

use App\Rules\ValidStateUF;
use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'person_type' => ['required', 'in:BUSINESS,PERSONAL'],
            'occupation' => ['nullable'],
            'nif_number' => ['required', 'unique:users,nif_number'],
            'registration_number' => ['nullable', 'unique:users,registration_number'],
            'marital_status' => ['nullable'],
            'gender' => ['nullable', 'in:MALE,FEMALE'],
            'role' => ['required', new ValidRole],
            'customer' => ['required', 'boolean']
            'registration_number' => ['required'],
            'address' => ['required', 'array'],
            'address.street' => ['required', 'string', 'max:255'],
            'address.number' => ['required', 'string', 'max:20'],
            'address.district' => ['required', 'string', 'max:255'],
            'address.city' => ['required', 'string', 'max:255'],
            'address.state' => ['required', 'string', 'max:2', new ValidStateUF()],
            'address.country' => ['required', 'string', 'max:255'],
            'address.complement' => ['nullable', 'string', 'max:255'],
            'address.zip_code' => ['required', 'string', 'max:10'],
        ];
    }
}
