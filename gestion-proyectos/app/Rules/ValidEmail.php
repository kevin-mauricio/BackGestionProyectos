<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute  El nombre del atributo a validar.
     * @param  mixed  $value  El valor del atributo.
     * @param  \Closure  $fail  El método que se llama en caso de fallo.
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail('El correo electrónico es requerido.');
            return;
        }

        $localPart = explode('@', $value)[0];
        if (strlen($localPart) < 3) {
            $fail('El correo electrónico debe tener al menos 3 caracteres en la parte local.');
            return;
        }

        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if (!preg_match($pattern, $value)) {
            $fail('El formato del correo electrónico es inválido.');
            return;
        }

        $domain = explode('@', $value)[1];
        if (preg_match('/^(\d+\.){1,}/', $domain)) {
            $fail('El dominio del correo electrónico no puede ser solo números como "1.com" o "11.com".');
            return;
        }
    }
}
