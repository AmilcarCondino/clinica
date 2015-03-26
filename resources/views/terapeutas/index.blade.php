@extends('layouts/header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1> Lista de Terapeutas </h1>
        </div>
    </div>
    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Curso</th>
                        <th>Email</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($terapeutas as $terapeuta)
                <tr>
                    <td>
                        {!! $terapeuta->nombre !!}
                    </td>
                    <td>
                        {!! $terapeuta->apellido !!}
                    </td>
                    <td>
                        {!! $terapeuta->dni !!}
                    </td>
                    <td>
                        {!! $terapeuta->telefono !!}
                    </td>
                    <td>
                        {!! $terapeuta->celular !!}
                    </td>
                    <td>
                        {!! $terapeuta->ano_de_cursada !!}
                    </td>
                    <td>
                        {!! $terapeuta->email !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'get', 'route' => ['terapeutas.edit', $terapeuta->id]]) !!}

                        {!! Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['terapeutas.destroy', $terapeuta->id]]) !!}

                        {!! Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>


                    <a href="/terapeutas/create">Crear</a>
    </div>
</div>
@stop