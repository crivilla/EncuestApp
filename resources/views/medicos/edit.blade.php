@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medico</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medico, [ 'route' => ['medicos.update',$medico->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del medico') !!}
                            {!! Form::text('name',$medico->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('surname', 'Apellidos del medico') !!}
                            {!! Form::text('surname',$medico->surname,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('numcolegiado', 'Número de colegiado del medico') !!}
                            {!! Form::text('numcolegiado',$medico->numcolegiado,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('especialidad', 'Especialidad') !!}
                            {!! Form::text('especialidad',$medico->especialidad,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email del medico') !!}
                            {!! Form::text('email',$medico->email,['class'=>'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection