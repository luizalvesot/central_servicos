<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Servico;

class FormaPagamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "forma_pagamentos";

    protected $fillable = [
        'nome_fpagamento',
        'descricao_fpagamento',
        'status_fpagamento'
    ];

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'forma_pagamento_id');
    }
}