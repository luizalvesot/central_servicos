<x-app-layout>
    <div class="container-sm">
        <div class="row pt-3 mx-1">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Página inicial</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                    </ol>
                </nav>
            </div>
            <div class="col text-end">
                <a href="{{route('clientes.create')}}" title="Cadastrar cliente" class="btn btn-sm btn-primary px-3 mb-1">
                    Cadastrar cliente
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>
        </div>
        <livewire:gerenciamento.clientes/>
    </div>
</x-app-layout>