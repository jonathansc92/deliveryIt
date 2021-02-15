@extends('layouts.main')
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Lista de Classificação</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Classificação</h6>
                        </div>
<div class="row col-md-12">

<a class="btn btn-success" style="margin: 10px" href="/classificacao/{{ Request::segment(2) }}">
                                                <i class="fa fa-medal"></i> 
                                                    Classificação Geral
                                                </a>
<a class="btn btn-success" style="margin: 10px" href="/classificacao/{{ Request::segment(2) }}/18-25">
                                                <i class="fa fa-medal"></i> 
                                                    Classificação 18 - 25 anos
                                                </a>
                                                <a class="btn btn-success" style="margin: 10px" href="/classificacao/{{ Request::segment(2) }}/25-35">
                                                <i class="fa fa-medal"></i> 
                                                    Classificação 25 - 35 anos
                                                </a>
                                                <a class="btn btn-success" style="margin: 10px" href="/classificacao/{{ Request::segment(2) }}/35-45">
                                                <i class="fa fa-medal"></i> 
                                                    Classificação 35 - 45 anos
                                                </a>
                                                <a class="btn btn-success" style="margin: 10px" href="/classificacao/{{ Request::segment(2) }}/55">
                                                <i class="fa fa-medal"></i> 
                                                    Classificação acima de 55 anos
                                                </a>
</div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>IDProva</th>
                                            <th>Tipo de prova (km)</th>
                                            <th>IDCorredor</th>
                                            <th>Idade</th>
                                            <th>Nome</th>
                                            <th>Posição</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    @foreach($classificacao as $key => $ranking)
                                    <tbody>
                                        <tr>
                                            <td>{{ $ranking->provas_id }}</td>
                                            <td>{{ $ranking->tipo_prova }} km</td>
                                            <td>{{ $ranking->corredores_id }}</td>
                                            <td>{{ $ranking->idade }} anos</td>
                                            <td>{{ $ranking->nome }}</td>
                                            <td>{{ $ranking->ranking }}</td>
                                            <td>{{ $ranking->nome }}</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
@stop

