
<h1 class="h3 mb-2 text-gray-800">Cadastro de Resultados</h1>

  @if(isset($resultado))
  {!! Form::open(['method' =>  'put' , 'url' => ['/resultados/update', $resultado->id]]) !!}   
  @else
  {!! Form::open(['method' =>  'post' , 'url' => '/resultados/store']) !!}
  @endif

      <div class="form-group">
        {!! Form::label('corredores_id', 'Corredor') !!} 
        <select class="corredoresItem form-control" name="corredores_id">
          @if(isset($resultado))
            <option value="{{ $resultado->corredores->id }}" selected>{{ $resultado->corredores->nome }}</option>
          @endif
         </select> 
      </div>

      <div class="form-group">
        {!! Form::label('provas_id', 'Prova') !!} 
        <select class="provasItem form-control" name="provas_id">
          @if(isset($resultado))
            <option value="{{ $resultado->provas->id }}" selected>{{ $resultado->provas->tipo_prova }}km - {{ $resultado->provas->data }}</option>
          @endif
        </select>
      </div>

      <div class="form-group">
        {!! Form::label('hora_inicio', 'Hora de Ínicio') !!} 
        {!! Form::time('hora_inicio', $value =  isset($resultado) ? $resultado->hora_inicio : null, ['class' => 'form-control', 'placeholder' => 'Hora de Ínicio', 'required' => true]) !!}
      </div>

      <div class="form-group">
        {!! Form::label('hora_conclusao', 'Hora de Conclusão') !!} 
        {!! Form::time('hora_conclusao', $value =  isset($resultado) ? $resultado->hora_conclusao : null, ['class' => 'form-control', 'placeholder' => 'Hora de Conclusão', 'required' => true]) !!}
      </div>

      {!! Form::submit('Salvar', ['class' => 'btn btn-primary'] ) !!}

  {!! Form::close() !!}

