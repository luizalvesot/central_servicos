<div>
    <!-- formulario -->
    <form class="row pt-2 pb-4 px-3 mb-2 mx-1 bg-gray-900 shadow rounded">
        <div class="row mb-2">
            <h5 class="h5 text-white">Filtros</h5>
        </div>
        
        <div class="row">
            <div class="col-md-3 mb-1">
                <label class="text-white"><strong>Início</strong></label>
                <input type="datetime-local" wire:model.live="inicio" id="inicio" class="form-control border rounded">
            </div>
            <div class="col-md-3 mb-1">
                <label class="text-white"><strong>Término</strong></label>
                <input type="datetime-local" wire:model.live="termino" id="termino" class="form-control border rounded">
            </div>
            <div class="col-md mb-1">
                <label class="text-white"><strong>Descrição</strong></label>
                <input type="text" placeholder="Descrição" wire:model.live="descricao" id="descricao" class="form-control border rounded">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-1">
                <label class="text-white"><strong>Cliente</strong></label>
                <input type="text" placeholder="Cliente" wire:model.live="cliente" id="cliente" class="form-control border rounded">
            </div>
            <div class="col-md mb-1">
                <label class="text-white"><strong>Status Pagamento</strong></label>
                <select wire:model.live="status_pagamento" id="status_pagamento" class="form-control border rounded">
                    <option value="">-- Todos --</option>
                    <option value="pago">Pago</option>
                    <option value="aberto">Aberto</option>
                </select>
            </div>
            <div class="col-md mb-1">
                <label class="text-white"><strong>Status Serviço</strong></label>
                <select wire:model.live="status_servico" id="status_servico" class="form-control border rounded">
                    <option value="">-- Todos --</option>
                    <option value="pago">Concluído</option>
                    <option value="aberto">Aberto</option>
                </select>
            </div>
        </div>
    </form>

    <!-- tabela de serviços -->
    <div class="row table-responsive py-2 px-3 mx-1 bg-gray-900 shadow rounded">
        <table class="table table-hover table-striped table-bordered caption-top text-center">
            <caption class="text-white">Lista de serviços</caption>
            <thead>
                <tr>
                    <th scope="col">Início</th>
                    <th scope="col">Fim</th>
                    <th scope="col">Tempo</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Pag</th>
                    <th scope="col">FP</th>
                    <th scope="col">Status</th>
                    <th scope="col"> - </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicos as $servico)
                    <tr onclick="window.location='{{ route('servicos.edit', $servico) }}'" style="cursor: pointer;">
                        <td>{{ $servico->inicio }}</td>
                        <td>{{ $servico->termino }}</td>
                        <td>{{ $servico->tempo_total }}</td>
                        <td>{{ $servico->cliente->nome_cliente }}</td> 
                        <td>{{ $servico->categoria_servico }}</td> 
                        <td>{{ $servico->valor }}</td> 
                        <td>{{ $servico->status_pagamento }}</td> 
                        <td>{{ $servico->forma_pagamento }}</td> 
                        <td>{{ $servico->status_servico }}</td> 
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar serviço"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('servicos.destroy', $servico) }}"
                                data-redirect="{{ route('servicos.index') }}"
                                id="delete{{ $servico->id }}"
                                onclick="deleteData({{ $servico->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination-sm text-dark">
            {{ $servicos->links() }}
        </div>
    </div>
</div>
