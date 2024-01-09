@extends('layout.layout')

@section('conteudo')
    <ul class="list-group col-4 mx-auto mt-5">
        @csrf
        <h2 class="mb-3">Temporadas de {{ $series->nome }}</h2>
        @foreach ($seasons as $key => $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a style="text-decoration: none; color:black" href="{{ route('episodes.index', $season->id) }}">
                    Temporada: {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
