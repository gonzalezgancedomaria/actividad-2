<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class formatoIBAN implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail) : void
    {
        if(!preg_match('/^(ES\d{2})(\d{4})(\d{4})(\d{2})(\d{10})$/', $value)){
            $fail($this->message());
        }
    }
    public function message()
    {
        return 'El campo debe tener un formato de IBAN español válido.';
    }
}
