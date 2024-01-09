@extends('layout.login')

@section('conteudo')
    <div class="col-4 mx-auto mt-5 border border-secondary p-5 bg-secondary-subtle">
        <div class="col-2 mx-auto">
            <h4>Cadastro</h4>
        </div>
        <form action="{{ route('cadastro.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome Completo</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <a href="{{ route('login.index') }}">Já tem conta?</a>
            <div class="d-grid gap-2 col-6 mx-auto mt-3">
                <button type="submit" class="btn btn-outline-secondary">Criar</button>
            </div>
        </form>
    </div>
@endsection
