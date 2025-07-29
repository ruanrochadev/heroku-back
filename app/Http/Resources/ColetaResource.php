<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ColetaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'quantidade_oleo' => $this->quantidade_oleo,
            'qualidade_oleo' => $this->qualidade_oleo,
            'dia_semana' => $this->dia_semana,
            'endereco' => $this->endereco, // adicione
            'telefone' => $this->telefone, // adicione
            'status' => $this->status,
            'estabelecimento' => [
                'id' => $this->estabelecimento->id,
                'nome' => $this->estabelecimento->nome,
                'endereco' => $this->estabelecimento->endereco,
                'telefone' => $this->estabelecimento->telefone,
            ],
            'transportador' => $this->transportador ? [
                'id' => $this->transportador->id,
                'nome_motorista' => $this->transportador->nome_motorista,
                'telefone' => $this->transportador->telefone,
            ] : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
