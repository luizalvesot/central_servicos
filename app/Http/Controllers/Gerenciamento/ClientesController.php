<?php

namespace App\Http\Controllers\Gerenciamento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Helpers\Swal;

class ClientesController extends Controller
{
    public $cep_cliente = null;
    public $cidade_cliente = null;
    public $estado_cliente = null;
    
    /**
     * Route: clientes/
     * Name: clientes.show
     * Method: GET
     **/
    public function show()
    {
        return view('gerenciamento.clientes.index');
    }

    /**
     * Route: clientes/create/
     * Name: clientes.create
     * Method: GET
     **/
    public function create()
    {
        return view('gerenciamento.clientes.create');
    }

    /**
     * Route: clientes/store/
     * Name: clientes.store
     * Method: POST
     **/
    public function store(Request $request)
    {
        $request->validate([
            'nome_cliente'      => 'required|max:255',
            'telefone_cliente'  => 'required',
            'documento_cliente' => 'nullable',
            'carteira_cliente'  => 'nullable',
            'cep'               => 'nullable',
            'cidade'            => 'nullable',
            'endereco'          => 'nullable',
            'bairro'            => 'nullable',
            'obs_cliente'       => 'nullable',
        ]);

        Cliente::create([
            'nome_cliente'      => $request->nome_cliente,
            'telefone_cliente'  => $request->telefone_cliente,
            'documento_cliente' => $request->documento_cliente,
            'carteira_cliente'  => $request->carteira_cliente,
            'cep'               => $request->cep,
            'cidade'            => $request->cidade,
            'endereco'          => $request->endereco,
            'bairro'            => $request->bairro,
            'obs_cliente'       => $request->obs_cliente,
        ]);

        return Swal::redirect(
            'success',
            'Cadastro de Cliente',
            'Cliente cadastrado com sucesso!',
            'clientes.show'
        );
    }

    /**
     * Route: clientes/{cliente}/edit/
     * Name: clients.edit
     * Method: GET
     **/
    public function edit(Cliente $cliente)
    {
        return view('gerenciamento.clientes.edit', compact('cliente'));
    }

    /**
     * Route: clientes/{cliente}/
     * Name: clientes.update
     * Method: PUT
     **/
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome_cliente'      => 'required|max:255',
            'telefone_cliente'  => 'required',
            'documento_cliente' => 'nullable',
            'carteira_cliente'  => 'nullable',
            'cep'               => 'nullable',
            'cidade'            => 'nullable',
            'endereco'          => 'nullable',
            'bairro'            => 'nullable',
            'obs_cliente'       => 'nullable',
        ]);

        $cliente->update([
            'nome_cliente'      => $request->nome_cliente,
            'telefone_cliente'  => $request->telefone_cliente,
            'documento_cliente' => $request->documento_cliente,
            'carteira_cliente'  => $request->carteira_cliente,
            'cep'               => $request->cep,
            'cidade'            => $request->cidade,
            'endereco'          => $request->endereco,
            'bairro'            => $request->bairro,
            'obs_cliente'       => $request->obs_cliente,
        ]);

        return Swal::redirect(
            'info',
            'Atualização de Cliente!',
            'Cliente atualizado com sucesso!',
            'clientes.show'
        );
    }

    /**
     * Route: clientes/{cliente}/
     * Name: clients.destroy
     * Method: DELETE
     **/
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
    }
}
