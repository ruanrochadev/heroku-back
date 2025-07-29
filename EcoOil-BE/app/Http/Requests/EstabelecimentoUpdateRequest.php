<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstabelecimentoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'sometimes|string|max:100',
            'tipo' => 'sometimes|string|max:50',
            'endereco' => 'sometimes|string|max:255',
            'telefone' => 'sometimes|string|max:20',
        ];
    }
    public function messages()
    {
        return [
            'nome.max' => 'O nome deve ter no máximo 100 caracteres!',
        ];
    }
}
