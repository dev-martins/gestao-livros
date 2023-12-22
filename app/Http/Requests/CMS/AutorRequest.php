<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
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

    public function rules(): array
    {
        return match (true) {
            $this->getMethod() == 'POST' => [
                'Nome'    => 'required|string|max:40|min:4',
            ],
            $this->getMethod() == 'PUT' => [
                'Nome'    => 'required|string|max:40|min:4',
            ],
            default => []
        };
    }

    public function messages(): array
    {
        return [
            "Nome.required" => 'O campo Nome é origatório',
            "Nome.string" => 'O campo Nome deve ser uma string',
            "Nome.min" => 'O campo Nome deve ter no minimo 3 caracteres',
            "Nome.max" => 'O campo Nome deve ter no máximo 20 caracteres',
        ];
    }
}
