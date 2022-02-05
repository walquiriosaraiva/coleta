@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Clima da região</div>
                        <div class="card-body">

                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-info-circle"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path
                                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                </svg>
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-2">
                                                    {!! $dados['results']['city'] !!}
                                                    - {!! $dados['results']['temp'] !!}
                                                    ºC
                                                </div>
                                                <div
                                                    class="h5 mb-0">{!! $dados['results']['description'] !!}
                                                </div>
                                                <div
                                                    class="h5 mb-0">
                                                    Nascer do Sol: {!! $dados['results']['sunrise'] !!} - Pôr do
                                                    Sol: {!! $dados['results']['sunset'] !!}
                                                </div>
                                                <div
                                                    class="h5 mb-0">
                                                    Velocidade do vento: {!! $dados['results']['wind_speedy'] !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
