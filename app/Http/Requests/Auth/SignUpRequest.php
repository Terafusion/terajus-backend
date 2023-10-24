<?php

namespace App\Http\Requests\Auth;

use App\Rules\ValidStateUF;
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
            'nif_number' => ['required'],
            'occupation' => ['nullable'],
            'person_type' => ['required', 'in:BUSINESS,PERSONAL'],
            'occupation' => ['nullable'],
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
