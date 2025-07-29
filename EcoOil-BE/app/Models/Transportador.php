<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_motorista',
        'telefone',
        'cnpj',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coletas()
    {
        return $this->hasMany(Coleta::class);
    }
}

