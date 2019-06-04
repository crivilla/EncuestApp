¡@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear respuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'respuestas.store']) !!}

                        <div class="form-group">
                            {!!Form::label('pregunta_id', 'Pregunta a la que contesta la respuesta') !!}
                            <br>
                            {!! Form::select('pregunta_id', $preguntas, ['class' => 'form-control'/*, 'required'*/]) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('valoracion_id', 'Valoracion para esta pregunta') !!}
                            <br>
                            {!! Form::select('valoracion_id', $valoracions, ['class' => 'form-control'/*, 'required'*/]) !!}
                        </div>

                        <!--
                        <div class="form-group">
                            <label name= "valoracion" for="valoracion_respuesta"> Valoración </label>
                            <select class="form-control" id="valoracion_respuesta" name="tipo">
                                <option value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                            </select>
                        </div>
                        -->

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection