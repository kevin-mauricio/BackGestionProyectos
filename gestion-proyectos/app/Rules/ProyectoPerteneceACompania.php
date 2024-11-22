<?php

namespace App\Rules;

use App\Models\Proyecto;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class ProyectoPerteneceACompania implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $companiaUser = Auth::user()->compania_id;
        $proyecto = Proyecto::find($value);
        if($proyecto && $proyecto->compania_id !== $companiaUser){
            $fail('El proyecto seleccionado no pertenece a tu compañia.');
            return;
        }

    }

}
