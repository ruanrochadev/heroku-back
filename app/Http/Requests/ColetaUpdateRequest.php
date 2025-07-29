<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColetaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quantidade_oleo' => 'sometimes|numeric|min:0.1',
            'qualidade_oleo' => 'sometimes|in:excelente,boa,regular,ruim',
            'dia_semana' => 'sometimes|in:segunda,terca,quarta,quinta,sexta,sabado,domingo',
            'status' => 'sometimes|in:disponivel,aceita,coletada,recusada', // adicione recusada
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages()
    {
        return [
            'quantidade_oleo.numeric' => 'A quantidade deve ser um número!',
            'quantidade_oleo.min' => 'A quantidade deve ser maior que 0!',
            'qualidade_oleo.in' => 'Qualidade deve ser: excelente, boa, regular ou ruim',
            'dia_semana.in' => 'Dia deve ser: segunda, terca, quarta, quinta, sexta, sabado ou domingo',
            'status' => 'sometimes|in:disponivel,aceita,coletada,recusada',
        ];
    }
}
