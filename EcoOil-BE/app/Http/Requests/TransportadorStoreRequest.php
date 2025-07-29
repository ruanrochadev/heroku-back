<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportadorStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
            return [
            'nome_motorista' => 'required|string|max:100',
            'telefone' => 'required|string|max:20',
            'cnpj' => 'required|string|unique:transportadors|max:18',
        ];
    }
    public function messages()
    {
            return [
            'nome_motorista.required' => 'O nome do motorista é obrigatório!!',
            'nome_motorista.max' => 'O nome deve ter no máximo 100 caracteres!',
            'telefone.required' => 'O telefone é obrigatório!!',
            'cnpj.required' => 'O CNPJ é obrigatório!!',
            'cnpj.unique' => 'Este CNPJ já está cadastrado!!',
        ];
    }
}
