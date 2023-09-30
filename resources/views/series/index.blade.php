<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($seriesList as $series)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $series->nome }}

            <div class="pl-a d-flex">
                <a class="btn btn-warning btn-sm" href="{{ route('series.edit', $series->id) }}">
                    E
                </a>
    
                <form action="{{ route('series.destroy', $series->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    
                    <button class="btn btn-danger btn-sm ms-2">
                        X
                    </button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</x-layout>