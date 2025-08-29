<?php

namespace App\Http\Controllers\Gerenciamento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Helpers\Swal;
use App\Models\Cliente;
use App\Models\CategoriaServico;

class ServicosController extends Controller
{
      /**
     * Route: servicos/
     * Name: servicos.show
     * Method: GET
     **/
    public function show()
    {
        return view('gerenciamento.servicos.index');
    }

    /**
     * Route: servicos/create/
     * Name: servicos.create
     * Method: GET
     **/
    public function create()
    {
        $clientes = Cliente::orderBy('nome_cliente')->get(); // busca todos os clientes
        $servicos = CategoriaServico::orderBy('nome_servico')->get();
        return view('gerenciamento.servicos.create', compact('clientes', 'servicos'));
    }

    /**
     * Route: servicos/store/
     * Name: servicos.store
     * Method: POST
     **/
    public function store(Request $request)
    {
        $request->validate([
            'inicio'            => 'required|max:255',
            'termino'           => 'nullable',
            'tempo_total'       => 'nullable',
            'cliente_id'        => 'required',
            'descricao'         => 'required',
            'categoria_servico' => 'nullable',
            'valor'             => 'nullable',
            'status_pagamento'  => 'nullable',
            'forma_pagamento'   => 'nullable',
            'status_servico'    => 'nullable',
            'obs'               => 'nullable',
        ]);

        Servico::create([
            'inicio'            => $request->inicio,
            'termino'           => $request->termino,
            'tempo_total'       => $request->tempo_total,
            'cliente_id'        => $request->cliente_id,
            'descricao'         => $request->descricao,
            'categoria_servico' => $request->categoria_servico,
            'valor'             => $request->valor,
            'status_pagamento'  => $request->status_pagamento,
            'forma_pagamento'   => $request->forma_pagamento,
            'status_servico'    => $request->status_servico,
            'obs'               => $request->obs,
        ]);

        return Swal::redirect(
            'success',
            'Cadastro de serviços',
            'Serviço cadastrado com sucesso!',
            'servicos.show'
        );
    }

    /**
     * Route: servicos/{servico}/edit/
     * Name: servicos.edit
     * Method: GET
     **/
    public function edit(Servico $servico)
    {
        $clientes = Cliente::orderBy('nome_cliente')->get();
        return view('gerenciamento.servicos.edit', compact('servico', 'clientes'));
    }

    /**
     * Route: servicos/{servico}/
     * Name: servicos.update
     * Method: PUT
     **/
    public function update(Request $request, Servico $servico)
    {
        $request->validate([
            'inicio'            => 'required|max:255',
            'termino'           => 'nullable',
            'tempo_total'       => 'nullable',
            'cliente_id'        => 'required',
            'descricao'         => 'required',
            'categoria_servico' => 'nullable',
            'valor'             => 'nullable',
            'status_pagamento'  => 'nullable',
            'forma_pagamento'   => 'nullable',
            'status_servico'    => 'nullable',
            'obs'               => 'nullable',
        ]);

        $servico->update([
            'inicio'            => $request->inicio,
            'termino'           => $request->termino,
            'tempo_total'       => $request->tempo_total,
            'cliente_id'        => $request->cliente_id,
            'descricao'         => $request->descricao,
            'categoria_servico' => $request->categoria_servico,
            'valor'             => $request->valor,
            'status_pagamento'  => $request->status_pagamento,
            'forma_pagamento'   => $request->forma_pagamento,
            'status_servico'    => $request->status_servico,
            'obs'               => $request->obs,
        ]);

        return Swal::redirect(
            'info',
            'Atualização de serviços!',
            'Serviço atualizado com sucesso!',
            'servicos.show'
        );
    }

    /**
     * Route: servicos/{servico}/
     * Name: servicos.destroy
     * Method: DELETE
     **/
    public function destroy(Servico $servico)
    {
        $servico->delete();
    }
}
