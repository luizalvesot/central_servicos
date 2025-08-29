<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cliente;
use App\Models\CategoriaServico;
use App\Models\FormaPagamento;

class Servico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "servicos";

    protected $fillable = [
        'inicio',
        'termino',
        'tempo_total',
        'cliente_id',
        'descricao',
        'categoria_servico_id',
        'valor',
        'status_pagamento',
        'forma_pagamento_id',
        'status_servico',
        'obs'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function categoriaServico()
    {
        return $this->belongsTo(CategoriaServico::class, 'categoria_servico_id');
    }

    public function formaPagamento()
    {
        return $this->belongsTo(FormaPagamento::class, 'forma_pagamento_id');
    }
}
