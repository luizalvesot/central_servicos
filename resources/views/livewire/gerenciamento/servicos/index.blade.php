<div>
    <!-- formulario -->
    <form class="row pt-2 pb-4 px-3 mb-2 mx-1 bg-gray-900 shadow rounded">
        <div class="col-md">
            <label class="text-white"><strong>Buscar serviço</strong></label>
            <input type="text" placeholder="Digite o que procura ..." wire:model.live="termo_pesquisa" id="termo_pesquisa"
                    class="form-control border rounded">
        </div>
    </form>

    <!-- tabela de serviços -->
    <div class="row table-responsive py-2 px-3 mx-1 bg-gray-900 shadow rounded">
        <table class="table table-hover table-striped table-bordered caption-top text-center">
            <caption class="text-white">Lista de serviços</caption>
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Tempo</th>
                    <th scope="col">Dif.</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoriaServicos as $categoriaServico)
                    <tr onclick="window.location='{{ route('categoriaServicos.edit', $categoriaServico) }}'" style="cursor: pointer;">
                        <td>{{ $categoriaServico->nome_servico }}</td>
                        <td>{{ $categoriaServico->tempo_servico }}</td>
                        <td>{{ $categoriaServico->dificuldade_servico }}</td>
                        <td>{{ $categoriaServico->valor_servico }}</td> 
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar categoria de serviço"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('categoriaServicos.destroy', $categoriaServico) }}"
                                data-redirect="{{ route('categoriaServicos.show', $categoriaServico) }}"
                                id="delete{{ $categoriaServico->id }}"
                                onclick="deleteData({{ $categoriaServico->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination-sm text-dark">
            {{ $categoriaServicos->links() }}
        </div>
    </div>
</div>
