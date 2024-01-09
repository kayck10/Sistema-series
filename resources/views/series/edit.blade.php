@extends('layout.layout')

@section('conteudo')
    <div class="col-3 mx-auto mt-5">
        <form action="{{ route('series.update', $series->id) }}" method="POST">
            @csrf @method('put')
            <div class="mb-3">
                <label class="form-label">Editar Série </label>
                <input type="text" name="nome" class="form-control" value="{{ $series->nome }}">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary">Salvar edição</button>
            </div>
        </form>
    </div>
@endsection
