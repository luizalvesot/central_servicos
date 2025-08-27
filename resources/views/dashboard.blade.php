<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row bg-white shadow rounded p-3 justify-content-end">
                <div class="col-md-2">
                    <a href="{{route('clientes.show')}}" title="Cadastro de clientes" class="btn btn btn-dark px-3">
                        Clientes
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('categoriaServicos.show')}}" title="Cadastro de categorias de serviços" class="btn btn btn-dark px-3">
                        Categorias de serviços
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
