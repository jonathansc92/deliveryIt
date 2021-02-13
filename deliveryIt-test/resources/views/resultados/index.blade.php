@extends('layouts.main')
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Resultados</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Resultados</h6>
                        </div>
                        <div class="col-md-12 pull-right py-3">
                            <a class="btn btn-primary" href="/resultados/create">
                                <i class="fa fa-plus"></i> Adicionar
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Corredor</th>
                                            <th>Prova (KM) </th>
                                            <th>Hora Ínicio</th>
                                            <th>Hora Conclusão</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    @foreach($resultados as $resultado)
                                    <tfoot>
                                        <tr>
                                            <td>{{ $resultado->id }}</td>
                                            <td>{{ $resultado->corredores->nome }}</td>
                                            <td>{{ $resultado->provas->tipo_prova }} km</td>
                                            <td>{{ $resultado->hora_inicio }}</td>
                                            <td>{{ $resultado->hora_conclusao }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="/resultados/edit/{{ $resultado->id }}">
                                                <i class="fa fa-edit"></i> 
                                                    Editar
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