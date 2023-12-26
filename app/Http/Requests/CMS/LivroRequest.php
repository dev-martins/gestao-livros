<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return match (true) {
            $this->getMethod() == 'POST' => [
                'Titulo' => 'required|string|max:40|min:4|unique:livros',
                'Editora' => 'required|string|max:40|min:4',
                'Edicao' => 'required|integer|min:0',
                'AnoPublicacao' => 'required|string|min:4|max:4',
                'Autores' => 'array',
                'Assuntos' => 'array',
            ],
            $this->getMethod() == 'PUT' => [
                'Titulo' => ['string', 'max:40', 'min:4', Rule::unique('livros', 'Titulo')->ignore($this->route('id'), 'CodL'),],
                'Editora' => 'string|max:40|min:4',
                'Edicao' => 'integer|min:0',
                'AnoPublicacao' => 'string|min:4|max:4',
                'Autores' => 'array',
                'Assuntos' => 'array',
            ],
            default => []
        };
    }

    public function messages(): array
    {
        return [
            "Titulo.required" => 'O campo Titulo é origatório',
            "Titulo.string" => 'O campo Titulo deve ser uma string',
            "Titulo.min" => 'O campo Titulo deve ter no minimo 3 caracteres',
            "Titulo.max" => 'O campo Titulo deve ter no máximo 20 caracteres',
            "Editora.required" => 'O campo Editora é origatório',
            "Editora.string" => 'O campo Editora deve ser uma string',
            "Editora.min" => 'O campo Editora deve ter no minimo 3 caracteres',
            "Editora.max" => 'O campo Editora deve ter no máximo 20 caracteres',
            "Edicao.required" => 'O campo Edicao é origatório',
            "Edicao.integer" => 'O campo Edicao é deve ser um inteiro',
            "Edicao.min" => 'O campo Edicao deve ter o valor minimo de 0',
            "AnoPublicacao.required" => 'O campo AnoPublicacao é origatório',
            "AnoPublicacao.string" => 'O campo AnoPublicacao deve ser uma string',
            "AnoPublicacao.min" => 'O campo AnoPublicacao deve ter no mínimo 4 caracteres no formato 2023',
            "AnoPublicacao.max" => 'O campo AnoPublicacao deve ter no máximo 4 caracteres no formato 2023',
            "Autores.array" => 'O campo Autores deve ser um array',
            "Autores.min" => 'O campo Autores deve conter no mínimo 1 autor',
            "Assuntos.array" => 'O campo Assuntos deve ser um array',
            "Assuntos.min" => 'O campo Assuntos deve conter no mínimo 1 assunto',
        ];
    }
}
