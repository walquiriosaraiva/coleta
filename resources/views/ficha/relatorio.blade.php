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

                            <form action="{{ route('fichas.pesquisa-relatorio') }}" name="formPesquisa"
                                  id="formPesquisa"
                                  method="post">
                                @method('POST')
                                @csrf
                                <div class="form-group row">
                                    <label for="id_user_cadastro" class="col-form-label">Liderança</label>
                                    <select class="form-control" data-live-search="true" id="id_user_cadastro"
                                            name="id_user_cadastro">
                                        <option data-tokens="ketchup mustard" value="">Selecione</option>
                                        @foreach($lideranca as $lider)
                                            <option data-tokens="ketchup mustard"
                                                    value="{{$lider->id}}" {{ $lider->id === $userSelecionado ? 'selected' : '' }} >{{$lider->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>

                            <table class="table table-responsive-lg table-striped"
                                   id="tabelaFichas">
                                <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>E-mail</td>
                                    <td>Endereço</td>
                                    <td>CEP</td>
                                    <td>Cidade/UF</td>
                                    <td>Telefone</td>
                                    <td>Rede social</td>
                                    <td>Área de atuação</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fichas as $ficha)
                                    <tr>
                                        <td>{{$ficha->nome}}</td>
                                        <td>{{$ficha->email}}</td>
                                        <td>{{$ficha->rua}} {{$ficha->numero}}</td>
                                        <td>{{$ficha->cep}} </td>
                                        <td>{{$ficha->cidade}} / {{$ficha->uf}}</td>
                                        <td>{{$ficha->telefone}}</td>
                                        <td>Facebook: {{$ficha->facebook}} <br/> Instagram: {{$ficha->instagram}}</td>
                                        <td>{{$ficha->areaAtuacao[0]->id === 4 ? $ficha->outra_atuacao : $ficha->areaAtuacao[0]->name}} </td>
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

            $('#id_user_cadastro').change(function () {
                $('#formPesquisa').submit();
            });

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
                dom: 'Bfrtip',
                pageLength: 25,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });

        });

    </script>
@endsection
