<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Servico;

class CategoriaServico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "categoria_servicos";

    protected $fillable = [
        'nome_servico',
        'chave_servico',
        'tempo_servico',
        'dificuldade_servico',
        'valor_servico',
        'obs_servico'
    ];

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'categoria_servico_id');
    }
}