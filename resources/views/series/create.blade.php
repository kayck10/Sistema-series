@extends('layout.layout')

@section('conteudo')
    <form action="{{ route('series.store') }}" method="POST" :nome="old('nome')" enctype="multipart/form-data">

        <h3 class="ms-5 mt-5">Adicionar Série</h3>
        @csrf
        <div class="row m-5">
            <div class="col-8">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label">Nome da Série:</label>
                    <input autofocus type="text" id="form8Example3" class="form-control" name="nome" />
                </div>
            </div>
            <div class="col-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form8Example4">Temporadas:</label>
                    <input type="text" name="seasonsQty" class="form-control" />
                </div>
            </div>
            <div class="col-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form8Example5">Episódios:</label>
                    <input type="text" name="episodesPerseason" id="form8Example5" class="form-control" />
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                <input type="file" id="cover" name="cover" class="form-control"
                    accept="image/gif, image/jpeg, image/png">
            </div>
        </div>
        <div class="d-grid gap-3 col-4 mx-auto">
            <button class="btn btn-primary" type="submit">Adicionar</button>
        </div>
    </form>
@endsection
