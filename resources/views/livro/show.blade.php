@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Detalhes do livro</div>
                        <div class="card-body">

                            <form action="" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Título</label>
                                    <div class="col-md-6">
                                        <input type="text" id="titulo" class="form-control" name="titulo"
                                               value="{{$livro['titulo']}}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address"
                                           class="col-md-4 col-form-label text-md-right">Descrição</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="3"
                                                  disabled>{{$livro['descricao']}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Autor</label>
                                    <div class="col-md-6">
                                        <input type="text" id="autor" class="form-control" name="autor"
                                               value="{{$livro['autor']}}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Número de
                                        páginas</label>
                                    <div class="col-md-6">
                                        <input type="text" id="numero_pagina" class="form-control" name="numero_pagina"
                                               value="{{$livro['numero_pagina']}}"
                                               disabled>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
