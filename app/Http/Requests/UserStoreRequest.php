<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);
        $data['password'] = Hash::make($data['password']);
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required | string | max:50',
            'email'=>'required | email | unique:users',
            'password'=>'required | min:8',
            'cnpj'=>'required | string',
            'endereco'=>'nullable | string', // opcional
            'telefone'=>'nullable | string', // opcional
            'tipo' => 'required|in:estabelecimento,transportador,admin',
        ];
    }
     public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório!!',
            'name.max' => 'O nome deve ter no máximo 50 caracteres!',
            'email.required' => 'O email é obrigatório!!',
            'email.email' => 'Informe um email válido!',
            'email.unique' => 'Email indisponível, cadastre outro email.',
            'password.required' => 'A senha é obrigatória!!',
            'password.min' => 'A senha deve ter no mínimo oito caracteres!',
            'cnpj.required' => 'O CNPJ é obrigatório!!',
            'tipo.required' => 'O tipo é obrigatório!!',
            'tipo.in' => 'Tipo deve ser: estabelecimento, transportador ou admin',
            
        ];
    }
}
