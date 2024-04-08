<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
            'guard_name' => 'nullable',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'guard_name' => 'api',
        ]);
    }
}