
<h1 class="h3 mb-2 text-gray-800">Cadastro de Corredores</h1>

  @if(isset($corredorProva))
  {!! Form::open(['method' =>  'put' , 'url' => ['/corredores-provas/update', $corredorProva->id]]) !!}   
  @else
  {!! Form::open(['method' =>  'post' , 'url' => '/corredores-provas/store']) !!}
  @endif

      <div class="form-group">
        {!! Form::label('corredores_id', 'Corredor') !!} 
        <select class="corredoresItem form-control" name="corredores_id" required>
          @if(isset($corredorProva))
            <option value="{{ $corredorProva->corredores->id }}" selected>{{ $corredorProva->corredores->nome }}</option>
          @endif
         </select> 
      </div>

      <div class="form-group">
        {!! Form::label('provas_id', 'Prova') !!} 
        <select class="provasItem form-control" name="provas_id" required>
          @if(isset($corredorProva))
            <option value="{{ $corredorProva->provas->id }}" selected>{{ $corredorProva->provas->tipo_prova }}km - {{ $corredorProva->provas->data }}</option>
          @endif
        </select>
      </div>

      {!! Form::submit('Salvar', ['class' => 'btn btn-primary'] ) !!}

  {!! Form::close() !!}



