<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportadorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'sometimes|string|max:100',
            'cnpj' => 'sometimes|string|unique:transportador,cnpj,'.$this->transportador->id.'|max:18',
            'telefone' => 'sometimes|string|max:20',
            'endereco' => 'sometimes|string|max:255',
            'capacidade' => 'sometimes|numeric|min:0',
            'disponivel' => 'sometimes|boolean'
        ];
    }
    public function messages()
    {
        return [
            'nome.max' => 'O nome deve ter no máximo 100 caracteres!',
            'cnpj.unique' => 'Este CNPJ já está cadastrado!!',
        ];
    }

}
