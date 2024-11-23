<?php

namespace App\Http\Requests;

use App\Rules\ValidEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompaniaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'nombre' => 'required|string|max:25',
                'nit' => ['required','max:20',Rule::unique('companias', 'nit')->ignore($this->route('compania'))],
                'telefono' => 'required|string|max:10',
                'direccion' => 'required|string|max:50',
                'correo' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('companias', 'correo')->ignore($this->route('compania')),
                    new ValidEmail
                ],
            ];
        }else{
            return [
                'nombre' => 'sometimes|required|string|max:25',
                'nit' => ['sometimes|required','max:20',Rule::unique('companias', 'nit')->ignore($this->route('compania'))],
                'telefono' => 'sometimes|required|string|max:10',
                'direccion' => 'sometimes|required|string|max:50',
                'correo' => [
                    'sometimes',
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('companias', 'correo')->ignore($this->route('compania')),
                    new ValidEmail
                ],
            ];
        }
    }
}
