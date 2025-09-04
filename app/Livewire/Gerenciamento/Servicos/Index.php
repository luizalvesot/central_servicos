<?php

namespace App\Livewire\Gerenciamento\Servicos;

use Livewire\Component;
use App\Models\Servico;
use Livewire\WithPagination;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class Index extends Component
{
    use WithPagination;

    public $descricao = '';
    public $inicio = '';
    public $termino = '';
    public $cliente = '';
    public $status_servico = '';
    public $status_pagamento = '';
    //public $servicos; 

    public function exportarPdf()
    {
        $query = Servico::with('cliente');

        if ($this->inicio) {
            $query->where('inicio', '>=', $this->inicio);
        }
        if ($this->termino) {
            $query->where('termino', '<=', $this->termino);
        }
        if ($this->descricao) {
            $query->where('descricao', 'like', "%{$this->descricao}%");
        }
        if ($this->cliente) {
            $query->whereHas('cliente', function ($q) {
                $q->where('nome_cliente', 'like', "%{$this->cliente}%");
            });
        }
        if ($this->status_pagamento) {
            $query->where('status_pagamento', $this->status_pagamento);
        }
        if ($this->status_servico) {
            $query->where('status_servico', $this->status_servico);
        }

        $servicos = $query->get();

        $pdf = Pdf::loadView('gerenciamento.servicos.pdf', compact('servicos'));

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'relatorio-servicos.pdf'
        );
    }

    public function render()
    {
        if (empty($this->inicio)) {
            $this->inicio = Carbon::now()->startOfMonth()->startOfDay()->format('Y-m-d H:i:s');
            //Inicio do dia
            //$this->inicio = Carbon::today()->startOfDay()->format('Y-m-d H:i:s');
            //$this->termino = Carbon::now()->format('Y-m-d H:i:s');
            $this->termino = Carbon::today()->setTime(23, 59, 59)->format('Y-m-d H:i:s');
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
