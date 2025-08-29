<x-app-layout>
    <div class="container-sm">
        <div class="row pt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Página inicial</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('servicos.show') }}">Serviços</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
        </div>

        <form method="POST" action="{{ route('servicos.update', $servico) }}">
            @csrf
            <div class="row bg-gray-900 text-white rounded mx-1 mb-4 p-3 justify-content-center">
                @method('PUT')
                @include('gerenciamento.servicos._form-fields')

                <div class="row text-right mt-4">
                    <div class="col">
                        <a href="{{ route('servicos.show', $servico) }}" class="btn btn-secondary px-4">Voltar</a>
                        <button type="submit" class="btn btn-primary btn px-5">Salvar</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
