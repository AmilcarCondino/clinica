@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Turnos create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/turnos">Turnos index</a>

        <div class="col-sm-12">
            {!! Form::open(array('url' => 'turnos')) !!}
                @include ('turns.form', ['submitButtonText' => 'Crear Turno'])
            {!! Form::close() !!}
        </div>

    </div>
</div>
@stop
