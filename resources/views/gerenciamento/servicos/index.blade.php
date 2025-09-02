<x-app-layout>
    <div class="container-sm">
        <div class="row pt-3 mb-2">
            <div class="col-md text-center">
                <a href="{{route('servicos.create')}}" title="Cadastrar serviços" class="btn btn-sm btn-primary px-3">
                    Cadastrar Serviço
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>
        </div>
        <livewire:gerenciamento.servicos/>
    </div>
</x-app-layout>