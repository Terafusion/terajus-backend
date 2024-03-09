<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidStateUF implements Rule
{
    public function passes($attribute, $value)
    {
        $validUfs = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

        return in_array($value, $validUfs);
    }

    public function message()
    {
        return 'O campo estado deve ser uma sigla de estado válida no Brasil.';
    }
}
