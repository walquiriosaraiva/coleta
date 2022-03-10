@extends('layout')

@section('content')
    <div class="container">

        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-3">
                <div class="col ps-4">

                    <div class="card">
                        <div class="card-body">
                            <div class="row dashboard">
                                <div class="col">
                                    <div class="card rounded-pill">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i>
                                                        Administradores - <span
                                                            class="font-weight-bold">{{$arrayPerfis['Administrador']}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-pill">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i>
                                                        Líderes de cidades - <span
                                                            class="font-weight-bold">{{$arrayPerfis['Líder cidade']}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-pill">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold"><i class="bi bi-diagram-3 me-3"></i> Lideranças
                                                        - <span
                                                            class="font-weight-bold">{{$arrayPerfis['Liderança']}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-pill">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold"><i class="bi bi-diagram-3 me-3"></i> Fichas de
                                                        Pessoas -
                                                        <span
                                                            class="font-weight-bold">{{$arrayPerfis['Pessoa']}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
