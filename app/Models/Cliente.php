<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Servico;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "clientes";

    protected $fillable = [
        'nome_cliente',
        'telefone_cliente',
        'documento_cliente',
        'carteira_cliente',
        'cep',
        'cidade',
        'bairro',
        'endereco',
        'obs_cliente'
    ];

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }
}
