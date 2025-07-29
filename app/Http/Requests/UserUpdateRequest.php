<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:50',
            'email' => 'sometimes|email|unique:users,email,'.$this->route('user')->id,
            'password' => 'sometimes|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'O nome deve ter no máximo 50 caracteres!',
            'email.email' => 'Informe um email válido!',
            'email.unique' => 'Email indisponível, cadastre outro email.',
            'password.min' => 'A senha deve ter no mínimo oito caracteres!',
        ];
    }
}
