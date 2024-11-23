<?php

namespace App\Http\Requests;

use App\Rules\ProyectoPerteneceACompania;
use Illuminate\Foundation\Http\FormRequest;

class HistoriaRequest extends FormRequest
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
        return [
            'titulo' => 'required|string|max:150',
            'proyecto_id' => ['required', 'exists:proyectos,id', new ProyectoPerteneceACompania],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El campo "título" es obligatorio.',
            'titulo.string' => 'El campo "título" debe ser una cadena de texto.',
            'titulo.max' => 'El campo "título" no debe exceder los 255 caracteres.',
            'proyecto_id.required' => 'El campo "proyecto" es obligatorio.',
            'proyecto_id.exists' => 'El proyecto seleccionado no existe en la base de datos.',
        ];
    }
}
