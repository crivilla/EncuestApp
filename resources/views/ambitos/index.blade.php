
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ámbitos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'ambitos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear ámbito', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre del ámbito</th>

                                <th colspan="2">Acciones</th>

                            </tr>

                            @foreach ($ambitos as $ambito)


                                <tr>
                                    <td>{{ $ambito->name }}</td>


                                    <td>
                                        {!! Form::open(['route' => ['ambitos.edit',$ambito->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['ambitos.destroy',$ambito->id], 'method' => 'delete']) !!}
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