<x-app-layout>
    <div class="container-sm">
        <div class="row pt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Página inicial</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categoriaServicos.show') }}">Categorias de serviços</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                </ol>
            </nav>
        </div>

        <form method="POST" action="{{ route('categoriaServicos.store') }}">
            @csrf
            <div class="row bg-gray-900 text-white rounded mx-1 mb-4 p-3 justify-content-center">

                @include('gerenciamento.categoriaServicos._form-fields')

                <div class="row text-right mt-4">
                    <div class="col-md">
                        <a href="{{ route('categoriaServicos.show') }}" class="btn btn-secondary px-4">Voltar</a>
                        <button type="submit" class="btn btn-primary px-5">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form> 
    </div>
</x-app-layout>
