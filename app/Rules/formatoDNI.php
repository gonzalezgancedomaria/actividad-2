<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class formatoDNI implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (strlen($value) !== 9) {
            $fail($this->message());
        }

        $digits = substr($value, 0, 8);
        $letter = strtoupper(substr($value, 8, 1));

        if (!ctype_digit($digits)) {
            $fail($this->message());
        }

        $letters = 'TRWAGMYFPDXBNJZSQVHLCKE'; //Letras validas en un DNI español
        $index = intval($digits) % 23;
        $expectedLetter = $letters[$index];

        if($letter !== $expectedLetter){
            $fail($this->message());
        };
    }

    public function message()
    {
        return 'El formato del campo DNI no es válido.';
    }
}
