<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $fillable = [
        'nome', 
        'email', 
        'telefone', 
        'cpf', 
        'conta_ativa'];
}
