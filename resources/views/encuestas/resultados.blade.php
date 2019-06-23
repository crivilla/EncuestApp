@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resultados encuesta</div>
                <div class="form-group">
                    {!! Form::label('encuesta_id', 'Identificador de la encuesta') !!}
                    {!! Form::text('encuesta_id',$encuesta->id,['class'=>'form-control', 'readonly']) !!}
                </div>
                @foreach ($preguntas as $pregunta)
                    <div class="form-group">
                       <?php echo ($pregunta->enunciado . ":");?>
                        <?php echo ($pregunta -> value);?>
                        <br>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection