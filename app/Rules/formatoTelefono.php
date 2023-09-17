<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class formatoTelefono implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^(\+)?[0-9]+$/', $value)){
            $fail($this->message());
        }
    }

    public function message()
    {
        return 'El campo debe tener un formato de número de teléfono válido.';
    }
}
