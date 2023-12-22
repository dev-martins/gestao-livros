<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
                'name'  => 'required|string|min:3|max:255',
                'email'    => 'required|email|unique:users',
                'password'    => 'required|string',
            ],
            $this->getMethod() == 'PUT' => [
                'name'  => 'string|min:3|max:255',
                'password'    => 'string',
                'email'    => ['email', Rule::unique('users', 'email')->ignore($this->route('id'))],
            ],
            default => []
        };
    }

    public function messages(): array
    {
        return [
            "name.required" => 'O campo name é origatório',
            "name.string" => 'O campo name deve ser uma string',
            "name.min" => 'O campo name deve ter no minimo 3 caracteres',
            "name.max" => 'O campo name deve ter no máximo 255 caracteres',
            "email.required" => 'O campo email é origatório',
            "email.email" => 'O campo email deve ser um email válido',
            "email.unique" => 'O email informado já está cadastrado!',
            "password.required" => 'O campo password é origatório',
            "password.string" => 'O campo password deve ser uma string',
        ];
    }
}
