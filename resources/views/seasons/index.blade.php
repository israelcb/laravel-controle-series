<x-layout title="Temporadas de '{!! $series->nome !!}'">
    <ul class="list-group">
        @foreach ($seasons as $season)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            @auth <a href="{{ route('episodes.index', $season->id) }}"> @endauth
                Temporada {{ $season->number }}
            @auth </a> @endauth
        
            @auth
            <span class="badge bg-secondary">
                {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
            </span>
            @endauth
        </li>
        @endforeach
    </ul>
</x-layout>