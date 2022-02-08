<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- javascript -->
    <script src="/js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="/js/popper.min.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>

    <title>Plataforma de cadastro</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">Plataforma de cadastro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Acesso restrito</a>
                    </li>
                @else
                    @if (\Illuminate\Support\Facades\Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fichas.index') }}">Ficha de
                                pessoa</a>
                        </li>

                        @if(\Illuminate\Support\Facades\Auth::user()->perfil[0]->id === 1)

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('fichas.relatorio') }}">Relatório de pessoas</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('area-atuacao.index') }}">Área de atuação</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">Usuários</a>
                            </li>

                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.edit', session()->get('user')->id) }}">Editar
                                perfil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Sair</a>
                        </li>
                    @endif
                @endguest
            </ul>

        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
