@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Cadastro de área de atuação</div>
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

                            <form action="{{ route('area-atuacao.store') }}" method="post">
                                @method('POST')
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Nome" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>

                                    <a href="{{ route('area-atuacao.index')}}"
                                       class="btn btn-info">Voltar</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
