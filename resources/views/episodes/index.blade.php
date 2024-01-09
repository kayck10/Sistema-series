@extends('layout.layout')

@section('conteudo')
    <form method="post">
        @csrf
        <ul class="list-group col-4 mx-auto mt-5">
            <h2 class="mb-3">Episódios</h2>
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    Episódio {{ $episode->number }}

                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                        @if ($episode->watched) checked @endif>

                </li>
            @endforeach
            @isset($mensagemSucesso)
                <div class="alert alert-success mt-3">
                    {{ $mensagemSucesso }}
                </div>
            @endisset
        </ul>
        <div class="d-grid gap-4 col-4 mx-auto">
            <button class="btn btn-primary m-4">Salvar</button>
        </div>
    </form>
@endsection
