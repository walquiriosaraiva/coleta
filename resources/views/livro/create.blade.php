@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Cadastro de livro</div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('livros.store') }}" method="post">
                                @method('POST')
                                @csrf
                                <div class="form-group row">
                                    <label for="titulo" class="col-md-4 col-form-label text-md-right">Título</label>
                                    <div class="col-md-6">
                                        <input type="text" id="titulo" class="form-control" name="titulo"
                                               value="{{ old('titulo') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="descricao"
                                           class="col-md-4 col-form-label text-md-right">Descrição</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="descricao" id="descricao"
                                                  rows="3">{{ old('descricao') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="autor" class="col-md-4 col-form-label text-md-right">Autor</label>
                                    <div class="col-md-6">
                                        <input type="text" id="autor" class="form-control" name="autor"
                                               value="{{ old('autor') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="numero_pagina" class="col-md-4 col-form-label text-md-right">Número de
                                        páginas</label>
                                    <div class="col-md-6">
                                        <input type="text" id="numero_pagina" class="form-control" name="numero_pagina"
                                               value="{{ old('numero_pagina') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Cadastrar
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
