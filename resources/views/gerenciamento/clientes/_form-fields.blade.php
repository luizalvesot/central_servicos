<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="nome_cliente" class="text-dark"><strong>Nome </strong><strong class="text-danger"> *</strong></label>
            <input type="text" class="form-control rounded py-1 @error('nome_cliente') is-invalid @enderror" 
                id="nome_cliente" name="nome_cliente" value="{{ $cliente->nome_cliente ?? old('nome_cliente') }}">
            
            @error('nome_cliente')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="telefone_cliente" class="text-dark"><strong>Telefone </strong><strong class="text-danger"> *</strong></label>
            <input type="text" class="form-control rounded py-1 @error('telefone_cliente') is-invalid @enderror" 
                id="telefone_cliente" name="telefone_cliente" value="{{ $cliente->telefone_cliente ?? old('telefone_cliente') }}">
            
            @error('telefone_cliente')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="documento_cliente" class="text-dark"><strong>Documento</strong></label>
            <input type="text" class="form-control rounded py-1 @error('documento_cliente') is-invalid @enderror" 
                id="documento_cliente" name="documento_cliente" value="{{ $cliente->documento_cliente ?? old('documento_cliente') }}">
            
            @error('documento_cliente')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md">
        <div class="form-group">
            <label for="carteira_cliente" class="text-dark"><strong>Carteira</strong></label>
            <select class="form-select rounded py-1 @error('carteira_cliente') is-invalid @enderror" id="carteira_cliente" name="carteira_cliente">
                @if(isset($cliente))
                    @if($cliente->carteira_cliente == "normal")
                        <option value="normal">Normal</option>
                        <option value="especial">Especial</option>
                    @else
                        <option value="especial">Especial</option>
                        <option value="normal">Normal</option>
                    @endif
                @else
                    <option value="normal">Normal</option>
                    <option value="especial">Especial</option>
                @endif
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="cep" class="text-dark"><strong>CEP</strong></label>
            <input type="text" class="form-control rounded py-1 @error('cep') is-invalid @enderror" 
                id="cep" name="cep" value="{{ $cliente->cep ?? old('cep') }}">
            
            @error('cep')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="cidade" class="text-dark"><strong>Cidade</strong></label>
            <input type="text" class="form-control rounded py-1 @error('cidade') is-invalid @enderror" 
                id="cidade" name="cidade" value="{{ $cliente->cidade ?? old('cidade') }}">
            
            @error('cidade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="endereco" class="text-dark"><strong>Endereco</strong></label>
            <input type="text" class="form-control rounded py-1 @error('endereco') is-invalid @enderror" 
                id="endereco" name="endereco" value="{{ $cliente->endereco ?? old('endereco') }}">
            
            @error('endereco')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="bairro" class="text-dark"><strong>Bairro</strong></label>
            <input type="text" class="form-control rounded py-1 @error('bairro') is-invalid @enderror" 
                id="bairro" name="bairro" value="{{ $cliente->bairro ?? old('bairro') }}">
            
            @error('bairro')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>


<div class="row">
    <label for="obs_cliente" class="text-dark"><strong>Observações</strong></label>
    <div class="form-floating">
        <textarea class="form-control rounded @error('obs_cliente') is-invalid @enderror"
            id="obs_cliente" name="obs_cliente" style="height: 110px; border-color:rgb(132, 132, 132)">
            {{ $cliente->obs_cliente ?? old('obs_cliente') }}
        </textarea>
    </div>
</div>
