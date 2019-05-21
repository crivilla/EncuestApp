@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medico, [ 'route' => ['encuestas.update',$encuesta->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('titulo', 'Titulo de la encuesta') !!}
                            {!! Form::text('titulo',$encuesta->titulo,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fechainicio', 'Fecha de inicio de la encuesta') !!}
                            {!! Form::text('fechainicio',$encuesta->fechainicio,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fechafinal', 'Fecha final de la encuesta') !!}
                            {!! Form::text('fechafinal',$encuesta->fechafinal,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('ambito_id', 'Ámbito de la encuesta') !!}
                            <br>
                            {!! Form::select('ambito_id', $encuesta->ambito_id, ['class' => 'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection