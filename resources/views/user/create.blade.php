@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Cadastro</div>
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Nome</label>
                                        <input type="text" id="name" class="form-control" name="name" required
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email_address">E-Mail</label>
                                        <input type="text" id="email_address" class="form-control" name="email"
                                               required
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="password">Senha</label>
                                        <input type="password" id="password" class="form-control" name="password"
                                               required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="password_confirmation">Confirma senha</label>
                                        <input type="password" id="password_confirmation" class="form-control"
                                               name="password_confirmation"
                                               required>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="id_perfil">Perfil</label>
                                        <select class="form-control" id="id_perfil"
                                                name="id_perfil" required>
                                            <option data-tokens="ketchup mustard" value="">Selecione</option>
                                            @foreach($perfis as $perfil)
                                                <option data-tokens="ketchup mustard"
                                                        value="{{$perfil->id}}">{{$perfil->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>

                                    <a href="{{ route('users.index')}}"
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
