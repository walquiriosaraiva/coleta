@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Ficha do pessoa</div>
                        <div class="card-body">

                            <form action="" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                               placeholder="Nome completo" value="{{ $ficha->nome }}" disabled>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone"
                                               placeholder="Telefone" value="{{ $ficha->telefone }}" disabled>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="telefone_whatsapp"
                                                   name="telefone_whatsapp"
                                                   {{$ficha->telefone_whatsapp ? "checked" : "" }} disabled>
                                            <label class="form-check-label" for="telefone_whatsapp">Whatsapp?</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="telefone_telegram"
                                                   name="telefone_telegram"
                                                   {{$ficha->telefone_telegram ? "checked" : "" }} disabled>
                                            <label class="form-check-label" for="telefone_telegram">Telegram?</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="E-mail" value="{{ $ficha->email }}" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="aniversario">Data de nascimento</label>
                                        <input type="text"
                                               class="form-control" id="aniversario"
                                               name="aniversario"
                                               placeholder="Dia/Mês" value="{{ $ficha->aniversario }}" disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep"
                                               placeholder="CEP" value="{{ $ficha->cep }}" disabled>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="rua">Endereço</label>
                                        <input type="text" class="form-control" id="rua" name="rua"
                                               placeholder="Endereço" value="{{ $ficha->rua }}" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" id="numero" name="numero"
                                               placeholder="Número" value="{{ $ficha->numero }}" disabled>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                               placeholder="Bairro" value="{{ $ficha->bairro }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                               placeholder="Cidade" value="{{ $ficha->cidade }}" disabled>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="uf">Estado/UF</label>
                                        <input type="text" class="form-control" id="uf" name="uf"
                                               placeholder="Estado/UF" value="{{ $ficha->uf }}" disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                               placeholder="Facebook" value="{{ $ficha->facebook }}" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                               placeholder="Instagram" value="{{ $ficha->instagram }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="id_area_atuacao" class="col-form-label">Área de
                                        atuação</label>
                                    <select class="form-control" data-live-search="true" id="id_area_atuacao"
                                            name="id_area_atuacao" disabled>
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
                                               disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <a href="{{ route('fichas.index')}}"
                                       class="btn btn-info">Voltar</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function () {

            if (parseInt($('#id_area_atuacao').val()) !== 4) {
                $('#div_outra_area').hide();
            }
        });
    </script>
@endsection
