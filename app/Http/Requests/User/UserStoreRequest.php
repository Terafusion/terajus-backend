<?php

namespace App\Http\Requests\User;

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
            'email' => ['required'],
            'password' => ['required'],
            'person_type' => ['required', 'in:BUSINESS,PERSONAL'],
            'occupation' => ['nullable'],
            'nif_number' => ['required'],
            'registration_number' => ['nullable', 'unique:users,registration_number'],
            'maritial_status' => ['nullable'],
            'gender' => ['nullable', 'in:MALE,FEMALE'],
            'role' => ['required', new ValidRole]
        ];
    }
}
