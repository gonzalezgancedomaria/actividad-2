<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class formatoEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(filter_var($value, FILTER_VALIDATE_EMAIL) === false){
            $fail($this->message());
        }
    }

    public function message()
    {
        return 'El campo debe tener un formato de email válido.';
    }
}