@extends('layout.layout')

@section('conteudo')
    <ul class="list-group col-4 mx-auto mt-5">

        @foreach ($series as $key => $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <img src="{{ asset('storage/' . $serie->cover) }}" width="100px" class="img-thumbnail">
                <a style="text-decoration: none; color:black" href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->nome }}
                </a>
                <span class="d-flex">
                    <a class="btn btn-primary-sm" href="{{ route('series.edit', $serie->id) }}">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">
                            X
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
        @isset($mensagemSucesso)
            <div class="alert alert-success mt-3">
                {{ $mensagemSucesso }}
            </div>
        @endisset
        @isset($mensagemExclui)
            <div class="alert alert-danger mt-2">
                {{ $mensagemExclui }}
            </div>
        @endisset
        <div class="d-grid gap-2 col-6 mx-auto mt-3">
            <a class="btn btn-primary" href="{{ route('series.create') }}">Adicionar</a>
        </div>
    </ul>
@endsection
