<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome',  
    'endereco', 
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
};
           