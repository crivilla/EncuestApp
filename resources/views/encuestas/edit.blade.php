@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($encuesta, [ 'route' => ['encuestas.update',$encuesta->id], 'method'=>'PUT']) !!}


                        <div class="form-group">
                            {!! Form::label('titulo', 'Titulo de la encuesta') !!}
                            {!! Form::text('titulo',$encuesta->titulo,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fechainicio', 'Fecha de inicio de la encuesta') !!}
                            <input type="datetime-local" id="fecha_hora" name="fechainicio" class="form-control" value="{{Carbon\Carbon::parse($encuesta->fechainicio)->format('Y-m-d\Th:i')}}" />

                        </div>
                        <div class="form-group">
                            {!! Form::label('fechafinal', 'Fecha final de la encuesta') !!}
                            <input type="datetime-local" id="fecha_hora" name="fechafinal" class="form-control" value="{{Carbon\Carbon::parse($encuesta->fechafinal)->format('Y-m-d\Th:i')}}" />
                        </div>

                        <div class="form-group">
                            {!!Form::label('ambito_id', 'Ámbito de la encuesta') !!}
                            <br>
                            {!! Form::select('ambito_id', $ambitos, ['class' => 'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection