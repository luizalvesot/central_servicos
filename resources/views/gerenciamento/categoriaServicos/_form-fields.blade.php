<div class="row my-2">
    <div class="col-md mb-1">
        <div class="form-group">
            <label for="nome_servico"><strong>Nome do serviço </strong><strong class="text-danger"> *</strong></label>
            <input type="text" class="form-control border rounded @error('nome_servico') is-invalid @enderror" 
                id="nome_servico" name="nome_servico" value="{{ $categoriaServico->nome_servico ?? old('nome_servico') }}">
            
            @error('nome_servico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md">
        <div class="form-group">
            <label for="chave_servico"><strong>Chave do serviço </strong><strong class="text-danger"> *</strong></label>
            <input type="text" class="form-control border rounded @error('chave_servico') is-invalid @enderror" 
                id="chave_servico" name="chave_servico" value="{{ $categoriaServico->chave_servico ?? old('chave_servico') }}" disabled>
            
            @error('chave_servico')
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
