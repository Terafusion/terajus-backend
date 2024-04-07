<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Spatie\Permission\Models\Role;

class ValidRole implements Rule
{
    public function __construct()
    {
    }

    public function passes($attribute, $value)
    {
        return Role::where('name', $value)->exists();
    }

    public function message()
    {
        return 'A Role fornecida não é válida.';
    }
}
