<?php

namespace App\Http\Requests\Auth;

use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'email' => ['required'],
            'password' => ['required'],
            'nif_number' => ['required', 'unique:users,nif_number'],
            'occupation' => ['nullable'],
            'person_type' => ['required', 'in:BUSINESS,PERSONAL'],
            'role' => ['required', new ValidRole],
            'marital_status' => ['nullable'],
            'gender' => ['nullable', 'in:MALE,FEMALE'],
            'registration_number' => ['nullable', 'unique:users,registration_number'],
        ];
    }
}
