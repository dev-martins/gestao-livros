<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssuntoRequest extends FormRequest
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
                'Descricao'    => 'required|string|max:20|min:4|unique:assuntos',
            ],
            $this->getMethod() == 'PUT' => [
                'Descricao'    => [
                    'required', 'string', 'max:20', 'min:4',
                    Rule::unique('assuntos', 'Descricao')->ignore($this->route('id'), 'CodAs'),
                ]
            ],
            default => []
        };
    }

    public function messages(): array
    {
        return [
            "Descricao.required" => 'O campo Descricao é origatório',
            "Descricao.string" => 'O campo Descricao deve ser uma string',
            "Descricao.min" => 'O campo Descricao deve ter no minimo 3 caracteres',
            "Descricao.max" => 'O campo Descricao deve ter no máximo 20 caracteres',
            "Descricao.unique" => 'O campo Descricao deve ser único',
        ];
    }

    // public function withValidator($validator)
    // {
    //     if ($this->getMethod() == 'PUT' || $this->getMethod() == 'DELETE' ) {
    //         $validator->after(function ($validator) {
    //             $result = Benefits::where('benefits_id', $this->benefits_id)->first();

    //             if (is_null($result)) {
    //                 $validator->errors()->add('benefits_id', 'O campo benefits_id selecionado é inválido.');
    //             }
    //         });
    //     }

    //     if ($this->getMethod() == 'DELETE') {
    //         $validator->after(function ($validator) {
    //             $result = Benefits::where('benefits_id', $this->benefits_id)->first();

    //             if (isset($result->enabled) && $result->enabled == 1) {
    //                 $validator->errors()->add('benefits_id', 'O registro selecionado está ativo, não é possível excluí-lo.');
    //             }
    //         });
    //     }
    // }
}
