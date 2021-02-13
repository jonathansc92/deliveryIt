
<h1 class="h3 mb-2 text-gray-800">Cadastro de Corredores</h1>

  @if(isset($corredor))
  {!! Form::open(['method' =>  'put' , 'url' => ['/corredores/update', $corredor->id]]) !!}   
  @else
  {!! Form::open(['method' =>  'post' , 'url' => '/corredores/store']) !!}
  @endif

      <div class="form-group">
        {!! Form::label('nome', 'Nome') !!} 
        {!! Form::text('nome', $value =  isset($corredor) ? $corredor->nome : null, ['class' => 'form-control', 'placeholder' => 'Nome', 'required' => true]) !!}
      </div>

      <div class="form-group">
        {!! Form::label('cpf', 'CPF') !!} 
        {!! Form::text('cpf', $value = isset($corredor) ? $corredor->cpf : null, ['class' => 'form-control', 'placeholder' => 'CPF']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('data_nascimento', 'Data de Nascimento') !!} 
        {!! Form::date('data_nascimento', $value =  isset($corredor) ? $corredor->data_nascimento : null, ['class' => 'form-control', 'placeholder' => 'Data de Nascimento', 'required' => true]) !!}
      </div>

      {!! Form::submit('Salvar', ['class' => 'btn btn-primary'] ) !!}

  {!! Form::close() !!}

