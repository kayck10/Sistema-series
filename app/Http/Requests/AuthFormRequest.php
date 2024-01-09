<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name', ['required' ,'min:6'],
            'email', ['required', 'min:6'],
            'password', ['required', 'min:3']
        ];
    }

    public function messages()
    {
        return [
            'name.rquired' => 'O campo nome é obrigatório e deve ter pelo menos 6 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.'
        ];
    }
}
