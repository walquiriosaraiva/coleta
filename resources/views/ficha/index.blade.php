@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('livros.create')}}"
                               class="btn btn-primary btn-sm">Novo</a>
                        </div>
                        <div class="card-body">

                            <div class="col-md-12">
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
                            </div>

                            <table class="table table-responsive-lg table-striped" style="width:100%"
                                   id="tabelaLivros">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Titulo</td>
                                    <td>Autor</td>
                                    <td>Data de cadastro</td>
                                    <td class="text-center">Ações</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($livros as $livro)
                                    <tr>
                                        <td>{{$livro->id}}</td>
                                        <td>{{$livro->titulo}}</td>
                                        <td>{{$livro->autor}}</td>
                                        <td>{{$livro->data_cadastro->format('d/m/Y')}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('livros.show', $livro->id)}}"
                                               class="btn btn-primary btn-sm">Detalhes</a>
                                            <a href="{{ route('livros.edit', $livro->id)}}"
                                               class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('livros.destroy', $livro->id)}}" method="post"
                                                  style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                        type="submit">Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function () {
            $('#tabelaLivros').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "search": "Pesquisa",
                    "paginate": {
                        "next": "Próxima",
                        "previous": "Anterior"
                    },
                }
            });
        });
    </script>
@endsection
