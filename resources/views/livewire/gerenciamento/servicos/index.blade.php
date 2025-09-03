<div>
    <!-- formulario -->
    <form class="row pt-2 pb-4 px-3 mb-2 mx-1 bg-gray-900 shadow rounded">
        <div class="row mb-2">
            <h5 class="h5 text-white">Filtros</h5>
        </div>
        
        <div class="row">
            <div class="col-md-3 mb-1">
                <label class="text-white"><strong>Início</strong></label>
                <input type="datetime-local" wire:model.live="inicio" id="inicio" class="form-control py-1 border rounded">
            </div>
            <div class="col-md-3 mb-1">
                <label class="text-white"><strong>Término</strong></label>
                <input type="datetime-local" wire:model.live="termino" id="termino" class="form-control py-1 border rounded">
            </div>
            <div class="col-md mb-1">
                <label class="text-white"><strong>Descrição</strong></label>
                <input type="text" placeholder="Descrição" wire:model.live="descricao" id="descricao" class="form-control py-1 border rounded">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-1">
                <label class="text-white"><strong>Cliente</strong></label>
                <input type="text" placeholder="Cliente" wire:model.live="cliente" id="cliente" class="form-control py-1 border rounded">
            </div>
            <div class="col-md mb-1">
                <label class="text-white"><strong>Status Pagamento</strong></label>
                <select wire:model.live="status_pagamento" id="status_pagamento" class="form-select py-1 border rounded">
                    <option value="">-- Todos --</option>
                    <option value="pago">Pago</option>
                    <option value="aberta">Aberto</option>
                </select>
            </div>
            <div class="col-md mb-1">
                <label class="text-white"><strong>Status Serviço</strong></label>
                <select wire:model.live="status_servico" id="status_servico" class="form-select py-1 border rounded">
                    <option value="">-- Todos --</option>
                    <option value="concluido">Concluído</option>
                    <option value="aberto">Aberto</option>
                </select>
            </div>
            <div class="col-md mt-auto mb-1 text-end">
                <a href="{{ route('servicos.pdf', request()->all()) }}" class="btn btn-danger">
                    <i class="bi bi-file-earmark-pdf"></i> Baixar PDF
                </a>
            </div>
        </div>
    </form>

    <!-- dashboard -->
    <div class="row my-2">
        <div class="col-md-2">
            <div class="card shadow m-1 bg-gray-800 text-white text-center">
                <div class="card-body">
                    <h5 class="card-title h5">Ser. exibidos</h5>
                    <p class="card-text">{{ $servicos->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow m-1 bg-gray-800 text-white text-center">
                <div class="card-body">
                    <h5 class="card-title h5">Valor total</h5>
                    <p class="card-text">R$ {{ number_format($servicos->sum('valor'), 2, ',', '.') }}</p>
                </div>
            </div> 
        </div>
        <div class="col-md-2">
            <div class="card shadow m-1 bg-gray-800 text-white text-center">
                <div class="card-body">
                    <h5 class="card-title h5">Receber</h5>
                    <p class="card-text">R$ {{ number_format($servicos->where('status_pagamento', 'aberta')->sum('valor'), 2, ',', '.') }}</p>
                </div>
            </div> 
        </div>
        <div class="col-md-2">
            <div class="card shadow m-1 bg-gray-800 text-white text-center">
                <div class="card-body">
                    <h5 class="card-title h5">Pagos</h5>
                    <p class="card-text">{{ $servicos->where('status_pagamento', 'pago')->count() }}</p>
                </div>
            </div> 
        </div>
        <div class="col-md-2">
            @php
                $totalMinutos = $servicos->sum('tempo_total');
                $horas = floor($totalMinutos / 60);
                $minutos = $totalMinutos % 60;
            @endphp
            <div class="card shadow m-1 bg-gray-800 text-white text-center">
                <div class="card-body">
                    <h5 class="card-title h5">Tempo total</h5>
                    <p class="card-text">{{sprintf('%02d:%02d', $horas, $minutos)}}</p>
                </div>
            </div> 
        </div>
        <div class="col-md-2">
            <div class="card shadow m-1 bg-gray-800 text-white text-center">
                <div class="card-body">
                    <h5 class="card-title h5">Finalizados</h5>
                    <p class="card-text">{{ $servicos->where('status_servico', 'concluido')->count() }}</p>
                </div>
            </div> 
        </div>
    </div>

    <!-- tabela de serviços -->
    <div class="row table-responsive py-2 px-3 mx-1 bg-gray-900 shadow rounded">
        <table class="table table-hover table-striped table-bordered table-sm caption-top text-center sortable" style="font-size: 0.9rem;">
            <caption class="text-white">Lista de serviços</caption>
            <thead>
                <tr>
                    <th scope="col">Início</th>
                    <th scope="col">Fim</th>
                    <th scope="col">Tempo</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Pag</th>
                    <th scope="col">Status</th>
                    <th scope="col"> - </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($servicos as $servico)
                    <tr onclick="window.location='{{ route('servicos.edit', $servico) }}'" style="cursor: pointer;">
                        <td>{{ \Carbon\Carbon::parse($servico->inicio)->format('d/m/Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($servico->termino)->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($servico->tempo_total)
                                {{ sprintf('%02d:%02d', floor($servico->tempo_total / 60), $servico->tempo_total % 60) }}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $servico->cliente->nome_cliente }}</td> 
                        <td>{{ $servico->descricao ?? ' - ' }}</td> 
                        <td>{{ $servico->valor ?? ' - '}}</td> 
                        <td>{{ $servico->status_pagamento ?? ' - '}}</td> 
                        @if($servico->status_servico == 'concluido')
                            <td><button class="btn btn-success btn-sm">Concluído</button></td> 
                        @else
                            <td><button class="btn btn-danger btn-sm">Aberto</button></td>
                        @endif
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar serviço"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('servicos.destroy', $servico) }}"
                                data-redirect="{{ route('servicos.show') }}"
                                id="delete{{ $servico->id }}"
                                onclick="event.stopPropagation(); deleteData({{ $servico->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">
                            Nenhum serviço encontrado
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination-sm text-dark">
            {{ $servicos->links() }}
        </div>
    </div>
</div>
