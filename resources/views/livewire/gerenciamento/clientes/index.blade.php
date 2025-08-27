<div>
    <!-- formulario -->
    <form class="row pt-2 pb-4 px-3 mb-2 mx-1 bg-gray-900 shadow rounded">
        <div class="col-md">
            <label class="text-white"><strong>Buscar</strong></label>
            <input type="text" placeholder="Digite o que procura ..." wire:model.live="termo_pesquisa" id="termo_pesquisa"
                    class="form-control border rounded">
        </div>
    </form>

    <!-- tabela de clientes -->
    <div class="row table-responsive py-2 px-3 mx-1 bg-gray-900 shadow rounded">
        <table class="table table-hover table-striped table-bordered caption-top text-center">
            <caption class="text-white">Lista de clientes</caption>
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr onclick="window.location='{{ route('clientes.edit', $cliente) }}'" style="cursor: pointer;">
                        <td>{{ $cliente->nome_cliente }}</td>
                        <td>{{ $cliente->telefone_cliente }}</td>
                        <td>{{ $cliente->endereco }}</td>  
                        <td>{{ $cliente->bairro }}</td> 
                        <td>{{ $cliente->cidade }}</td> 
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar cliente"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('clientes.destroy', $cliente) }}"
                                data-redirect="{{ route('clientes.show', $cliente) }}"
                                id="delete{{ $cliente->id }}"
                                onclick="deleteData({{ $cliente->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination-sm text-dark">
            {{ $clientes->links() }}
        </div>
    </div>
</div>
