
<h1 class="h3 mb-2 text-gray-800">Cadastro de Corredores</h1>

  @if(isset($corredorProva))
  {!! Form::open(['method' =>  'put' , 'url' => ['/corredores-provas/update', $corredorProva->id]]) !!}   
  @else
  {!! Form::open(['method' =>  'post' , 'url' => '/corredores-provas/store']) !!}
  @endif

      <div class="form-group">
        {!! Form::label('corredores_id', 'Corredor') !!} 
        <select class="corredoresItem form-control" name="corredores_id" value="1"></select>
        <!-- {!! Form::select('corredores_id', [], isset($corredorProva) ? $corredorProva->corredores_id : 1, ['class'=>'corredoresItem form-control']) !!} -->
      </div>

      <div class="form-group">
        {!! Form::label('provas_id', 'Prova') !!} 
        <select class="provasItem form-control" name="provas_id">
        <option value="volvo" selected>Volvo</option>
        </select>
      </div>

      {!! Form::submit('Salvar', ['class' => 'btn btn-primary'] ) !!}

  {!! Form::close() !!}



