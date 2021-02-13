@extends('layouts.main')
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Corredores</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Corredores</h6>
                        </div>
                        <div class="col-md-12 pull-right py-3">
                            <a class="btn btn-primary" href="/corredores/create">
                                <i class="fa fa-plus"></i> Adicionar
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th>Data Nascimento</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    @foreach($corredores as $corredor)
                                    <tfoot>
                                        <tr>
                                            <td>{{ $corredor->id }}</td>
                                            <td>{{ $corredor->nome }}</td>
                                            <td>{{ $corredor->cpf }}</td>
                                            <td>{{ $corredor->data_nascimento }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="/corredores/edit/{{ $corredor->id }}">
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

