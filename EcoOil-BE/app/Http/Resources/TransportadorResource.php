<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransportadorResource extends JsonResource
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
            'nome_motorista' => $this->nome_motorista,
            'telefone' => $this->telefone,
            'cnpj' => $this->cnpj,
            'user' => $this->whenLoaded('user'),        
            'coletas' => $this->whenLoaded('coletas'),  
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
