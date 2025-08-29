<div class="row my-2">
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="inicio"><strong>Início </strong><strong class="text-danger"> *</strong></label>
            <input type="datetime-local" class="form-control border rounded @error('inicio') is-invalid @enderror" id="inicio" name="inicio"value="{{ old('inicio', isset($servico->inicio) ? \Carbon\Carbon::parse($servico->inicio)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">

            @error('inicio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="termino"><strong>Término </strong></label>
            <input type="datetime-local" class="form-control border rounded @error('termino') is-invalid @enderror" id="termino" name="termino" value="{{ old('termino', isset($servico->termino) ? \Carbon\Carbon::parse($servico->termino)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">

            @error('termino')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="tempo_total"><strong>Tempo Total </strong></label>
            <input type="text" class="form-control border rounded" id="tempo_total" name="tempo_total" value="{{ $servico->tempo_total ?? old('tempo_total') }}" disabled>
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="cliente"><strong>Cliente </strong><strong class="text-danger"> *</strong></label>
            <select id="cliente" name="cliente_id" class="form-control border rounded @error('cliente_id') is-invalid @enderror">
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
    <div class="col-md">
        <div class="form-group">
            <label for="descricao"><strong>Descrição do serviço </strong><strong class="text-danger"> *</strong></label>
            <input type="text" class="form-control border rounded @error('descricao') is-invalid @enderror" 
                id="descricao" name="descricao" value="{{ $servico->descricao ?? old('descricao') }}">

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
            <label for="tempo_servico" ><strong>Tempo do serviço (segundos)</strong></label>
            <input type="number" class="form-control border rounded @error('tempo_servico') is-invalid @enderror" 
                id="tempo_servico" name="tempo_servico" value="{{ $categoriaServico->tempo_servico ?? old('tempo_servico') }}">
            
            @error('tempo_servico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md">
        <div class="form-group">
            <label for="dificuldade_servico" ><strong>Grau de dificuldade</strong></label>
            <input type="number" class="form-control border rounded @error('dificuldade_servico') is-invalid @enderror" 
                id="dificuldade_servico" name="dificuldade_servico" value="{{ $categoriaServico->dificuldade_servico ?? old('dificuldade_servico') }}">
            
            @error('dificuldade_servico')
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
            <label for="valor_servico"><strong>Valor do serviço</strong></label>
            <input type="number" step="0.01" 
                class="form-control border rounded @error('valor_servico') is-invalid @enderror" 
                id="valor_servico" name="valor_servico" 
                value="{{ $categoriaServico->valor_servico ?? old('valor_servico') }}">
            
            @error('valor_servico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row my-2">
    <label for="obs_servico"><strong>Observações</strong></label>
    <div class="form-floating">
        <textarea class="form-control rounded @error('obs_servico') is-invalid @enderror" id="obs_servico" name="obs_servico" style="height: 110px; border-color:rgb(132, 132, 132)">{{ $categoriaServico->obs_servico ?? old('obs_servico') }}</textarea>
    </div>
</div>

<script>
    new TomSelect("#cliente", {
        create: false, // impede criar novos clientes
        sortField: { field: "text", direction: "asc" },
    });
</script>
