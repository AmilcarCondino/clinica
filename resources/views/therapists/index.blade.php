@extends('layouts/header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1> Lista de Therapists </h1>
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
                @foreach($therapists as $therapist)
                <tr>
                    <td>
                        {!! $therapist->name !!}
                    </td>
                    <td>
                        {!! $therapist->last_name !!}
                    </td>
                    <td>
                        {!! $therapist->dni !!}
                    </td>
                    <td>
                        {!! $therapist->phone !!}
                    </td>
                    <td>
                        {!! $therapist->cell_phone !!}
                    </td>
                    <td>
                        {!! $therapist->career_year !!}
                    </td>
                    <td>
                        {!! $therapist->email !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'get', 'route' => ['therapists.edit', $therapist->id]]) !!}

                        {!! Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['therapists.destroy', $therapist->id]]) !!}

                        {!! Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>


                    <a href="/therapists/create">Crear</a>
    </div>
</div>
@stop