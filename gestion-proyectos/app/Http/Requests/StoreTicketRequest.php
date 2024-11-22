<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'descripcion' => 'required|string|max:255',
            'comentarios' => 'required|string|max:500',
            'estado' => 'required|string|in:Activo,En Proceso,Finalizado',
            'historia_usuario_id' => 'required|integer|exists:historias_usuario,id',
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser un texto.',
            'descripcion.max' => 'La descripción no puede superar los 255 caracteres.',
            'comentarios.required' => 'Los comentarios son obligatorios.',
            'comentarios.string' => 'Los comentarios deben ser texto.',
            'comentarios.max' => 'Los comentarios no pueden superar los 500 caracteres.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.string' => 'El estado debe ser un texto.',
            'estado.in' => 'El estado debe ser uno de los siguientes valores: Activo, En Proceso, Finalizado.',
            'historia_usuario_id.required' => 'El ID de la historia de usuario es obligatorio.',
            'historia_usuario_id.integer' => 'El ID de la historia de usuario debe ser un número entero.',
            'historia_usuario_id.exists' => 'La historia de usuario no existe.',
        ];
    }
}
