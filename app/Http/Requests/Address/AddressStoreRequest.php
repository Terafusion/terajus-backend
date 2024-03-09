<?php

namespace App\Http\Requests\Address;

use App\Rules\ValidModelType;
use App\Rules\ValidStateUF;
use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
{
    /**
     * Determine if the Address is authorized to make this request.
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
            'addressable_type' => ['required', 'string', new ValidModelType],
            'addressable_id' => ['required', 'numeric'],
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:20'],
            'district' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:2', new ValidStateUF()],
            'country' => ['required', 'string', 'max:255'],
            'complement' => ['nullable', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:10'],
        ];
    }
}
