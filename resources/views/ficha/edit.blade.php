@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Editar ficha do pessoa</div>
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

                            <form action="{{ route('fichas.update', $ficha->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                @csrf
                                <input type="hidden" name="ibge" id="ibge">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                               placeholder="Nome completo" value="{{ $ficha->nome }}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone"
                                               placeholder="Telefone" value="{{ $ficha->telefone }}">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="telefone_whatsapp"
                                                   name="telefone_whatsapp"
                                                {{$ficha->telefone_whatsapp ? "checked" : "" }} >
                                            <label class="form-check-label" for="telefone_whatsapp">Whatsapp?</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep"
                                               placeholder="CEP" value="{{ $ficha->cep }}">
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="rua">Endereço</label>
                                        <input type="text" class="form-control" id="rua" name="rua"
                                               placeholder="Endereço" value="{{ $ficha->rua }}">
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                               placeholder="Bairro" value="{{ $ficha->bairro }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                               placeholder="Cidade" value="{{ $ficha->cidade }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="uf">Estado/UF</label>
                                        <input type="text" class="form-control" id="uf" name="uf"
                                               placeholder="Estado/UF" value="{{ $ficha->uf }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                               placeholder="Facebook" value="{{ $ficha->facebook }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                               placeholder="Instagram" value="{{ $ficha->instagram }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="id_area_atuacao" class="col-form-label">Área de
                                        atuação</label>
                                    <select class="form-control" data-live-search="true" id="id_area_atuacao"
                                            name="id_area_atuacao">
                                        <option data-tokens="ketchup mustard" value="-1">Selecione</option>
                                        @foreach($areaAtuacao as $area)
                                            <option data-tokens="ketchup mustard"
                                                    value="{{$area->id}}" {{ $ficha->id_area_atuacao === $area->id ? "selected" : ""  }} >{{$area->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-row" id="div_outra_area">
                                    <div class="form-group col-md-12">
                                        <label for="outra_atuacao">Outra área de atuação</label>
                                        <input type="text" class="form-control" id="outra_atuacao" name="outra_atuacao"
                                               placeholder="Outra área de atuação" value="{{ $ficha->outra_atuacao }}"
                                        >
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                    <a href="{{ route('fichas.index')}}"
                                       class="btn btn-primary">Voltar</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            if (parseInt($('#id_area_atuacao').val()) !== 4) {
                $('#div_outra_area').hide();
            }

            $('#id_area_atuacao').change(function () {
                if (parseInt($(this).val()) === 4) {
                    $('#div_outra_area').show();
                } else {
                    $('#div_outra_area').hide();
                }
            })

            function limpa_formulário_cep() {
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            $("#cep").blur(function () {

                var cep = $(this).val().replace(/\D/g, '');

                if (cep !== "") {
                    var validacep = /^[0-9]{8}$/;

                    if (validacep.test(cep)) {

                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                            if (!("erro" in dados)) {
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } else {
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } else {
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } else {
                    limpa_formulário_cep();
                }
            });
        });
    </script>
@endsection
