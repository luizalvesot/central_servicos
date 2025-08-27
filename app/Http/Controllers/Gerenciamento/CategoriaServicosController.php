<?php

namespace App\Http\Controllers\Gerenciamento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaServico;
use App\Helpers\Swal;

class CategoriaServicosController extends Controller
{
      /**
     * Route: categoriaServicos/
     * Name: categoriaServicos.show
     * Method: GET
     **/
    public function show()
    {
        return view('gerenciamento.categoriaServicos.index');
    }

    /**
     * Route: categoriaServicos/create/
     * Name: categoriaServicos.create
     * Method: GET
     **/
    public function create()
    {
        return view('gerenciamento.categoriaServicos.create');
    }

    /**
     * Route: categoriaServicos/store/
     * Name: categoriaServicos.store
     * Method: POST
     **/
    public function store(Request $request)
    {
        $request->validate([
            'nome_servico'        => 'required|max:255',
            'tempo_servico'       => 'nullable',
            'dificuldade_servico' => 'nullable',
            'valor_servico'       => 'nullable',
            'obs_servico'         => 'nullable',
        ]);

        CategoriaServico::create([
            'nome_servico'        => $request->nome_servico,
            'chave_servico'       => $request->nome_servico,
            'tempo_servico'       => $request->tempo_servico,
            'dificuldade_servico' => $request->dificuldade_servico,
            'valor_servico'       => $request->valor_servico,
            'obs_servico'         => $request->obs_servico
        ]);

        return Swal::redirect(
            'success',
            'Cadastro de categoria de serviços',
            'Categoria de serviços cadastrada com sucesso!',
            'categoriaServicos.show'
        );
    }

    /**
     * Route: categoriaServicos/{categoriaServico}/edit/
     * Name: categoriaServicos.edit
     * Method: GET
     **/
    public function edit(CategoriaServico $categoriaServico)
    {
        return view('gerenciamento.categoriaServicos.edit', compact('categoriaServico'));
    }

    /**
     * Route: categoriaServicos/{categoriaServico}/
     * Name: categoriaServicos.update
     * Method: PUT
     **/
    public function update(Request $request, CategoriaServico $categoriaServico)
    {
        $request->validate([
            'nome_servico'        => 'required|max:255',
            'tempo_servico'       => 'nullable',
            'dificuldade_servico' => 'nullable',
            'valor_servico'       => 'nullable',
            'obs_servico'         => 'nullable',
        ]);

        $categoriaServico->update([
            'nome_servico'        => $request->nome_servico,
            'chave_servico'       => $request->nome_servico,
            'tempo_servico'       => $request->tempo_servico,
            'dificuldade_servico' => $request->dificuldade_servico,
            'valor_servico'       => $request->valor_servico,
            'obs_servico'         => $request->obs_servico
        ]);

        return Swal::redirect(
            'info',
            'Atualização de categoria de serviços!',
            'Categoria de serviços atualizada com sucesso!',
            'categoriaServicos.show'
        );
    }

    /**
     * Route: categoriaServicos/{categoriaServico}/
     * Name: categoriaServicos.destroy
     * Method: DELETE
     **/
    public function destroy(CategoriaServico $categoriaServico)
    {
        $categoriaServico->delete();
    }
}
