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
                @foreach($supervisors as $supervisor)
                <tr>
                    <td>
                        {!! $supervisor->name !!}
                    </td>
                    <td>
                        {!! $supervisor->last_name !!}
                    </td>
                    <td>
                        {!! $supervisor->phone !!}
                    </td>
                    <td>
                        {!! $supervisor->cell_phone !!}
                    </td>
                    <td>
                        {!! $supervisor->email !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'get', 'route' => ['supervisors.edit', $supervisor->id]]) !!}

                        {!! Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['supervisors.destroy', $supervisor->id]]) !!}

                        {!! Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <a href="/supervisors/create">Crear</a>
        </div>
    </div>
    @stop