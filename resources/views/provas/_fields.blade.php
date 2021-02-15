
<h1 class="h3 mb-2 text-gray-800">Cadastro de Corredores</h1>

  @if(isset($prova))
  {!! Form::open(['method' =>  'put' , 'url' => ['/provas/update', $prova->id]]) !!}   
  @else
  {!! Form::open(['method' =>  'post' , 'url' => '/provas/store']) !!}
  @endif

      <div class="form-group">
        {!! Form::label('tipo_prova', 'Tipo Prova') !!} 
        {!! Form::number('tipo_prova', $value =  isset($prova) ? $prova->tipo_prova : null, ['class' => 'form-control', 'placeholder' => 'Tipo Prova', 'required' => true]) !!}
      </div>

      <div class="form-group">
        {!! Form::label('data', 'Data') !!} 
        {!! Form::date('data', $value =  isset($prova) ? $prova->data : null, ['class' => 'form-control', 'placeholder' => 'Data', 'required' => true]) !!}
      </div>

      {!! Form::submit('Salvar', ['class' => 'btn btn-primary'] ) !!}

  {!! Form::close() !!}

