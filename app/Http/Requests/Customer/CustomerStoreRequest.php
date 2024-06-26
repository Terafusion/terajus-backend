<?php

namespace App\Http\Requests\Customer;

use App\Rules\UniqueTenantNifNumber;
use App\Rules\ValidStateUF;
use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required'],
            'person_type' => ['required', 'in:BUSINESS,PERSONAL'],
            'occupation' => ['nullable'],
            'nif_number' => ['required', new UniqueTenantNifNumber],
            'registration_number' => ['nullable'],
            'marital_status' => ['nullable'],
            'gender' => ['nullable', 'in:MALE,FEMALE'],
            'is_customer' => ['required', 'boolean'],
            'address' => ['nullable', 'array'],
            'address.number' => ['required_with:address,!=,null', 'string', 'max:20'],
            'address.street' => ['required_with:address,!=,null', 'string', 'max:255'],
            'address.district' => ['required_with:address,!=,null', 'string', 'max:255'],
            'address.city' => ['required_with:address,!=,null', 'string', 'max:255'],
            'address.state' => ['required_with:address,!=,null', 'string', 'max:2', new ValidStateUF()],
            'address.country' => ['required_with:address,!=,null', 'string', 'max:255'],
            'address.complement' => ['nullable', 'string', 'max:255'],
            'address.zip_code' => ['required_with:address,!=,null', 'string', 'max:10'],
        ];
    }
}
