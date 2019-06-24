¡@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear pregunta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' =>'preguntas.store']) !!}

                        <div class="form-group">
                            {!! Form::label('encuesta_id', 'Identificador de la encuesta') !!}
                            {!! Form::text('encuesta_id',$id,['class'=>'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('enunciado', 'Enunciado de la pregunta') !!}
                            {!! Form::text('enunciado',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>

                        <div class="form-group">
                            <label name= "tipo" for="tipo_pregunta"> Tipo de la pregunta </label>
                            <select class="form-control" id="tipo_pregunta" name="tipo">
                                <option value="valoracion0a5">Valoración numérica de 0 a 5</option>
                                <option value="valoracion0a10">Valoración numérica de 0 a 10</option>
                                <!--<option value="tipocreado"> Tipo de valoración creado </option>-->

                            </select>
                        </div>
<!--
                        <div class="form-group">
                            {//!!Form::label('encuesta_id', 'Encuesta de la que forma parte') !!}
                            <br>
                            {//!! Form::select('encuesta_id', $encuestas, ['class' => 'form-control', 'required']) !!}

                        </div>-->


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection