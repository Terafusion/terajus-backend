<?php

namespace App\Http\Requests\DocumentRequest;

use App\Rules\TenantCustomer;
use Illuminate\Foundation\Http\FormRequest;

class DocumentRequestStoreRequest extends FormRequest
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
            'customer_id' => ['required', 'exists:customers,id', new TenantCustomer],
            'documents' => ['required', 'array'],
            'documents.*.document_type_id' => ['required', 'exists:document_types,id'],
            'documents.*.description' => ['nullable', 'string']
        ];
    }
}
