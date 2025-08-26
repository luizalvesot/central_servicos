<?php

namespace App\Livewire\Gerenciamento\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;

class Index extends Component
{
     use WithPagination;

    public $termo_pesquisa = '';

    public function render()
    {
        $clientes = Cliente::where('nome_cliente', 'like', "%".$this->termo_pesquisa."%")
                    ->orWhere('cidade', 'like', "%".$this->termo_pesquisa."%")
                    ->orWhere('telefone_cliente', 'like', "%".$this->termo_pesquisa."%")
                    ->orWhere('bairro', 'like', "%".$this->termo_pesquisa."%")
                    ->paginate(10);

        return view('livewire.gerenciamento.clientes.index', compact('clientes'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
