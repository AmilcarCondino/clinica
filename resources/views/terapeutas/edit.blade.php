@extends('layouts/header')

@section('content')

<div class="col-sm-12">
    <h1> Terapeutas edit page </h1>
</div>

<div class="col-sm-12">
    <a href="/terapeutas">Terapeutas index</a>

    <div class="col-sm-12">
        {!! Form::open(array('method' => 'PATCH', 'route' => ['terapeutas.update', $terapeuta->id])) !!}

        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('nombre', 'Nombre: ') !!}
                        {!! Form::text('nombre', $terapeuta->nombre, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('apellido', 'Apellido: ') !!}
                        {!! Form::text('apellido', $terapeuta->apellido, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('dni', 'D.N.I.: ') !!}
                        {!! Form::text('dni', $terapeuta->dni, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('telefono', 'Telefono: ') !!}
                        {!! Form::text('telefono', $terapeuta->telefono, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('celular', 'Celular: ') !!}
                        {!! Form::text('celular', $terapeuta->celular, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('ano_de_cursada', 'Año de curso: ') !!}
                        {!! Form::text('ano_de_cursada', $terapeuta->ano_de_cursada, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('email', 'Email: ') !!}
                        {!! Form::text('email', $terapeuta->email, ['class' => 'validate']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <input class="btn btn-sm-3 btn-success form-control" type="submit" value="Guardar Nuevo Terapeuta">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-block btn-danger" href="/terapeutas" role="button">Cancelar</a>
                </div>
            </div>
        </div>

        {!! Form::close() !!}

@stop