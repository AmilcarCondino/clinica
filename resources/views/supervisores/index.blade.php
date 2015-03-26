@extends('layouts/header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1> Lista de Supervisores </h1>
        </div>
    </div>
    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($supervisores as $supervisor)
                <tr>
                    <td>
                        {!! $supervisor->nombre !!}
                    </td>
                    <td>
                        {!! $supervisor->apellido !!}
                    </td>
                    <td>
                        {!! $supervisor->telefono !!}
                    </td>
                    <td>
                        {!! $supervisor->celular !!}
                    </td>
                    <td>
                        {!! $supervisor->email !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'get', 'route' => ['supervisores.edit', $supervisor->id]]) !!}

                        {!! Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['supervisores.destroy', $supervisor->id]]) !!}

                        {!! Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <a href="/supervisores/create">Crear</a>
        </div>
    </div>
    @stop