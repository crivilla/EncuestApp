
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Encuestas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'encuestas.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear encuesta', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Título</th>
                                <th>FechaInicio</th>
                                <th>FechaFinal</th>
                                <th>Ambito</th>
                                <th colspan="2">Acciones</th>

                            </tr>

                            @foreach ($encuestas as $encuesta)


                                <tr>
                                    <td>{{ $encuesta->titulo }}</td>
                                    <td>{{ $encuesta->fechainicio }}</td>
                                    <td>{{ $encuesta->fechafinal}}</td>
                                    <td>{{ $encuesta->especialidad->name}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['encuestas.edit',$encuesta->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['encuestas.destroy',$encuesta->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection