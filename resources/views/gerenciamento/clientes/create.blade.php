<x-app-layout>
    <div class="container-sm">
        <div class="row pt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Página inicial</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clientes.show') }}">Clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                </ol>
            </nav>
        </div><hr>
        
        <form method="POST" action="{{ route('clientes.store') }}">
            @csrf
            <div class="row bg-gray-900 text-white p-4 shadow-lg mt-2 mb-4 rounded">

                @include('gerenciamento.clientes._form-fields')

                <div class="row text-right mt-4">
                    <div class="col-md">
                        <a href="{{ route('clientes.show') }}" class="btn btn-secondary btn px-4">Voltar</a>
                        <button type="submit" class="btn btn-primary btn px-5">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form> 
    </div>
</x-app-layout>
