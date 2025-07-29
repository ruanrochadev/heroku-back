<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstabelecimentoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'cnpj' => 'required|string|unique:estabelecimentos|max:18'
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório!!',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres!',
            'cnpj.required' => 'O CNPJ é obrigatório!!',
            'cnpj.unique' => 'Este CNPJ já está cadastrado!!',
            ];
    }
}
