<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColetaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quantidade_oleo' => 'required|numeric|min:0.1',
            'qualidade_oleo' => 'required|in:excelente,boa,regular,ruim',
            'dia_semana' => 'required|in:segunda,terca,quarta,quinta,sexta,sabado,domingo',
            'endereco' => 'required|string',
            'telefone' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'quantidade_oleo.required' => 'A quantidade de óleo é obrigatória!',
            'quantidade_oleo.numeric' => 'A quantidade deve ser um número!',
            'quantidade_oleo.min' => 'A quantidade deve ser maior que 0!',
            'qualidade_oleo.required' => 'A qualidade do óleo é obrigatória!',
            'qualidade_oleo.in' => 'Qualidade deve ser: excelente, boa, regular ou ruim',
            'dia_semana.required' => 'O dia da semana é obrigatório!',
            'dia_semana.in' => 'Dia deve ser: segunda, terca, quarta, quinta, sexta, sabado ou domingo',
        ];
    }
}
