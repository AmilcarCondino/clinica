@extends('layouts/header')

@section('content')

<div class="col-sm-12">
    <h1> Supervisores edit page </h1>
</div>

<div class="col-sm-12">
    <a href="/supervisores">Supervisores index</a>

    <div class="col-sm-12">
        {!! Form::open(array('method' => 'PATCH', 'route' => ['supervisores.update', $supervisor->id])) !!}

        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('nombre', 'Nombre: ') !!}
                        {!! Form::text('nombre', $supervisor->nombre, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('apellido', 'Apellido: ') !!}
                        {!! Form::text('apellido', $supervisor->apellido, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('telefono', 'Telefono: ') !!}
                        {!! Form::text('telefono', $supervisor->telefono, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('celular', 'Celular: ') !!}
                        {!! Form::text('celular', $supervisor->celular, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('email', 'Email: ') !!}
                        {!! Form::text('email', $supervisor->email, ['class' => 'validate']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <input class="btn btn-sm-3 btn-success form-control" type="submit" value="Guardar Nuevo Supervisor">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-block btn-danger" href="/supervisores" role="button">Cancelar</a>
                </div>
            </div>
        </div>

        {!! Form::close() !!}

        @stop