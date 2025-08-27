<?php

namespace App\Livewire\Gerenciamento\CategoriaServicos;

use Livewire\Component;
use App\Models\CategoriaServico;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $termo_pesquisa = '';

    public function render()
    {
        $categoriaServicos = CategoriaServico::where('nome_servico', 'like', "%".$this->termo_pesquisa."%")
                    ->orWhere('tempo_servico', 'like', "%".$this->termo_pesquisa."%")
                    ->orWhere('dificuldade_servico', 'like', "%".$this->termo_pesquisa."%")
                    ->orWhere('valor_servico', 'like', "%".$this->termo_pesquisa."%")
                    ->paginate(10);

        return view('livewire.gerenciamento.categoria-servicos.index', compact('categoriaServicos'));
    }
}
