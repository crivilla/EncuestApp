@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear medico</div>

                    <div class="panel-body">
                        @include('flash::message')  //adaptar a nuestros atributos

                        {!! Form::open(['route' => 'medicos.store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del medico') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('surname', 'Apellidos del medico') !!}
                            {!! Form::text('surname',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('numcolegiado', 'Número de colegiado del medico') !!}
                            {!! Form::text('numcolegiado',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('especialidad', 'Especialidad') !!}
                            {!! Form::text('especialidad',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email del medico') !!}
                            {!! Form::text('email',null,['class'=>'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection