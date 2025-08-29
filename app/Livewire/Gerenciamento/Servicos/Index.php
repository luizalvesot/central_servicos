<?php

namespace App\Livewire\Gerenciamento\Servicos;

use Livewire\Component;
use App\Models\Servico;
use Livewire\WithPagination;
use Carbon\Carbon;

class Index extends Component
{
    use WithPagination;

    public $descricao = '';
    public $inicio = '';
    public $termino = '';
    public $cliente = '';
    public $status_servico = '';
    public $status_pagamento = '';

    public function render()
    {
        if (empty($this->inicio)) {
            $this->inicio = Carbon::today()->startOfDay()->format('Y-m-d H:i:s');
            $this->termino = Carbon::now()->format('Y-m-d H:i:s');
        }
        
        $servicos = Servico::where('descricao', 'like', "%".$this->descricao."%")
                        ->where('status_pagamento', 'like', "%".$this->status_pagamento."%")
                        ->where('status_servico', 'like', "%".$this->status_servico."%")
                        ->where(function ($q) {
                            if ($this->cliente) {
                                $q->whereHas('cliente', function ($query) {
                                    $query->where('nome_cliente', 'like', "%".$this->cliente."%");
                                });
                            }
                        })
                        ->where('inicio', '>=', $this->inicio)
                        ->where('termino', '<=', $this->termino)
                        ->orderByDesc('inicio')
                        ->paginate(10);

        return view('livewire.gerenciamento.servicos.index', compact('servicos'));
    }
}
