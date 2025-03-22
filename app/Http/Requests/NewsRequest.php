<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'titulo'=> 'required|min:3',
            'subtitulo'=> 'required|min:6',
            'text'=> 'required|min:20',
            'cover'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'titulo.required'=> 'O Campo Titulo É Obrigatorio!',
            'titulo.min'=> 'Titulo : Digite Ao Menos 3 Caracteres!',
            'subtitulo.required'=> 'O Campo Sub-Titulo É Obrigatorio!',
            'subtitulo.min'=> 'Sub-Titulo : Digite Ao Menos 6 Caracteres!',
            'text.required'=> 'O Campo Texto É Obrigatorio!',
            'cover.required'=> 'O Campo Imagem É Obrigatorio!',
            'text.min'=> 'Texto : Digite Ao Menos 20 Caracteres!',
        ];
    }
}
