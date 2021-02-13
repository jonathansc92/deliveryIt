@extends('layouts.main')
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Corredores em Provas</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Corredores em Provas</h6>
                        </div>
                        <div class="col-md-12 pull-right py-3">
                            <a class="btn btn-primary" href="/corredores-provas/create">
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
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    @foreach($corredoresProvas as $corredorProva)
                                    <tfoot>
                                        <tr>
                                            <td>{{ $corredorProva->id }}</td>
                                            <td>{{ $corredorProva->corredores["nome"] }}</td>
                                            <td>{{ $corredorProva->provas["tipo_prova"] }} km</td>
                                            <td>
                                                <a class="btn btn-primary" href="/corredores-provas/edit/{{ $corredorProva->id }}">
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