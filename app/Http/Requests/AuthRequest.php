<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
                'email'    => 'required|email',
                'password'    => 'required|string',
            ],
            default => []
        };
    }

    public function messages(): array
    {
        return [
            "email.required" => 'O campo email é origatório',
            "email.email" => 'O campo email deve ser um email válido',
        ];
    }
}
