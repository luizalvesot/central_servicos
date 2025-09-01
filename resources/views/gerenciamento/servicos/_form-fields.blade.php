<div class="row my-2">
    <!---->
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="inicio"><strong>Início </strong><strong class="text-danger"> *</strong></label>
            <input type="datetime-local" 
                    class="form-control border rounded @error('inicio') is-invalid @enderror" 
                    id="inicio" 
                    name="inicio"
                    value="{{ old('inicio', isset($servico->inicio) ? \Carbon\Carbon::parse($servico->inicio)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}"
            >

            @error('inicio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!---->
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="termino"><strong>Término </strong></label>
            <input type="datetime-local" 
                    class="form-control border rounded @error('termino') is-invalid @enderror" 
                    id="termino" 
                    name="termino" 
                    value="{{ old('termino', isset($servico->termino) ? \Carbon\Carbon::parse($servico->termino)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}"
            >

            @error('termino')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!---->
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="tempo_total"><strong>Tempo Total </strong></label>
            <input type="text" 
                    class="form-control border rounded" 
                    id="tempo_total" 
                    name="tempo_total" 
                    value="{{ $servico->tempo_total ?? old('tempo_total') }}" disabled
            >
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="cliente"><strong>Cliente </strong><strong class="text-danger"> *</strong></label>
            <select id="cliente" 
                    name="cliente_id" 
                    class="form-control border rounded @error('cliente_id') is-invalid @enderror"
            >
                <option value="">-- Selecione um cliente --</option>
                @foreach($clientes as $clienteOption)
                    <option value="{{ $clienteOption->id }}" 
                        {{ (isset($servico) && $servico->cliente_id == $clienteOption->id) ? 'selected' : '' }}>
                        {{ $clienteOption->nome_cliente }} | {{ $clienteOption->bairro }}
                    </option>
                @endforeach
            </select>

            @error('cliente_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!---->
    <div class="col-md">
        <div class="form-group">
            <label for="descricao"><strong>Descrição do serviço </strong><strong class="text-danger"> *</strong></label>
            <input type="text" 
                class="form-control border rounded @error('descricao') is-invalid @enderror" 
                id="descricao" 
                name="descricao" 
                value="{{ $servico->descricao ?? old('descricao') }}"
            >

            @error('descricao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="categoria"><strong>Categoria </strong><strong class="text-danger"> *</strong></label>
            <select id="categoria_servico_id" 
                    name="categoria_servico_id" 
                    class="form-control border rounded @error('categoria_servico_id') is-invalid @enderror"
            >
                <option value="">-- Selecione uma categoria --</option>
                @foreach($categoriaServicos as $categoriaServicoOption)
                    <option value="{{ $categoriaServicoOption->id }}" 
                        {{ (isset($servico) && $servico->categoria_servico_id == $categoriaServicoOption->id) ? 'selected' : '' }}>
                        {{ $categoriaServicoOption->nome_servico }} | {{ $categoriaServicoOption->valor_servico }}
                    </option>
                @endforeach
            </select>

            @error('categoria_servico_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!---->
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="valor"><strong>Valor do serviço</strong></label>
            <input type="number" 
                step="0.01" 
                class="form-control border rounded @error('valor') is-invalid @enderror" 
                id="valor" name="valor" 
                value="{{ $servico->valor ?? old('valor') }}">
            
            @error('valor')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!---->
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="status_pagamento"><strong>Status Pagamento</strong></label>
            <select id="status_pagamento" 
                    name="status_pagamento" 
                    class="form-control border rounded @error('status_pagamento') is-invalid @enderror"
            >
                <option value="">-- Selecione o status de pagamento --</option>
                <option value="aberta" {{ (isset($servico) && $servico->status_pagamento == 'aberta') ? 'selected' : '' }}>
                    Aberta
                </option>
                <option value="pago" {{ (isset($servico) && $servico->status_pagamento == 'pago') ? 'selected' : '' }}>
                    Pago
                </option>
            </select>

            @error('status_pagamento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="forma_pagamento"><strong>Forma de pagamento </strong></label>
            <select id="forma_pagamento_id" 
                    name="forma_pagamento_id" 
                    class="form-control border rounded @error('forma_pagamento_id') is-invalid @enderror"
            >
                <option value="">-- Selecione a forma de pagamento --</option>
                @foreach($formaPagamentos as $formaPagamentoOption)
                    <option value="{{ $formaPagamentoOption->id }}" 
                        {{ (isset($servico) && $servico->forma_pagamento_id == $formaPagamentoOption->id) ? 'selected' : '' }}>
                        {{ $formaPagamentoOption->nome_fpagamento }}
                    </option>
                @endforeach
            </select>

            @error('forma_pagamento_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!---->
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="status_servico"><strong>Status do serviço </strong></label>
            <select id="status_servico" 
                name="status_servico" 
                class="form-control border rounded @error('status_servico') is-invalid @enderror"
            >
                <option value="">-- Selecione o status do serviço --</option>
                <option value="aberto" {{ (isset($servico) && $servico->status_servico == 'aberto') ? 'selected' : '' }}>
                    Aberto
                </option>
                <option value="concluido" {{ (isset($servico) && $servico->status_servico == 'concluido') ? 'selected' : '' }}>
                    Concluído
                </option>
            </select>

            @error('status_servico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row my-2">
    <label for="obs"><strong>Observações do serviço</strong></label>
    <div class="form-floating">
        <textarea 
            class="form-control rounded @error('obs') is-invalid @enderror" 
            id="obs" 
            name="obs" 
            style="height: 110px; border-color:rgb(132, 132, 132)"
        >{{ $servico->obs ?? old('obs') }}</textarea>
    </div>
</div>

<script>
    new TomSelect("#cliente", {
        create: false, // impede criar novos clientes
        sortField: { field: "text", direction: "asc" },
    });
</script>
