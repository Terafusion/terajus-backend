<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidModelType implements Rule
{
    public function passes($attribute, $value)
    {
        return class_exists($value);
    }

    public function message()
    {
        return 'The model type :attribute is invalid.';
    }
}
