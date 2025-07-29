<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'estabelecimento_id',
        'transportador_id',
        'quantidade_oleo',
        'qualidade_oleo',
        'dia_semana',
        'endereco',
        'telefone',
        'status',
    ];

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class);
    }

    public function transportador()
    {
        return $this->belongsTo(Transportador::class);
    }
}
