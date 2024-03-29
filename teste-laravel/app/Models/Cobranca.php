<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;


class Cobranca extends Model
{
    use HasFactory;

    protected $fillable = [
      'cliente_id',
      'valor',
      'data_vencimento',
      'status',
      'descricao',
  ];
    public function cliente()
    {
      return $this->belongsTo(Cliente::class);
    }

}
