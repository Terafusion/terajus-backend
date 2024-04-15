<?php

namespace App\Http\Requests\User;

use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => ['nullable'],
            'email' => ['nullable'],
            'password' => ['nullable'],
            'occupation' => ['nullable'],
            'marital_status' => ['nullable'],
            'registration_number' => ['nullable'],
            'role' => ['nullable', new ValidRole],
        ];
    }
}
