<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'cpf',
        'email', 
        'endereco', 
    ];
    public function cobrancas()
    {
        return $this->hasMany(Cobranca::class); 
    }
}
