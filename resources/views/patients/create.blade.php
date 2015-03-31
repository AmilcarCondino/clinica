@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Pacientes create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/pacientes">Pacientes index</a>

        <div class="col-sm-12">
            {!! Form::open(array('url' => 'pacientes')) !!}
                @include ('patients.form', ['submitButtonText' => 'Crear Paciente'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
