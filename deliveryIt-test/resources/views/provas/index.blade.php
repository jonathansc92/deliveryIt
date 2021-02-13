@extends('layouts.main')
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Provas</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Provas</h6>
                        </div>
                        <div class="col-md-12 pull-right py-3">
                            <a class="btn btn-primary" href="/provas/create">
                                <i class="fa fa-plus"></i> Adicionar
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipo Prova (KM)</th>
                                            <th>Data</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    @foreach($provas as $prova)
                                    <tfoot>
                                        <tr>
                                            <td>{{ $prova->id }}</td>
                                            <td>{{ $prova->tipo_prova }}</td>
                                            <td>{{ $prova->data }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="/provas/edit/{{ $prova->id }}">
                                                <i class="fa fa-edit"></i> 
                                                    Editar
                                                </a>
                                                <a class="btn btn-success" href="/classificacao/{{ $prova->id }}" target="_blank">
                                                <i class="fa fa-medal"></i> 
                                                   Ver Classificação Geral
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
@stop