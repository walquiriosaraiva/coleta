@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('fichas.create')}}"
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
                                   id="tabelaFichas">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td>Data de nascimento</td>
                                    <td>Data de cadastro</td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->perfil[0]->id === 1)
                                        <td class="text-center">Ações</td>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fichas as $ficha)
                                    <tr>
                                        <td>{{$ficha->id}}</td>
                                        <td>{{$ficha->nome}}</td>
                                        <td>{{$ficha->aniversario}}</td>
                                        <td>{{$ficha->data_cadastro->format('d/m/Y')}}</td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->perfil[0]->id === 1)
                                            <td class="text-center">
                                                <a href="{{ route('fichas.show', $ficha->id)}}"
                                                   class="btn btn-primary btn-sm">Detalhes</a>
                                                <a href="{{ route('fichas.edit', $ficha->id)}}"
                                                   class="btn btn-primary btn-sm">Editar</a>
                                                <form action="{{ route('fichas.destroy', $ficha->id)}}" method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                            type="submit">Excluir
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

    <script>

        $(document).ready(function () {

            $('#tabelaFichas').DataTable({
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
                    }
                },
                responsive: true

            });

        });

    </script>
@endsection
