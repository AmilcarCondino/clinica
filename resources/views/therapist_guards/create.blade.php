@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Guardias create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/turnos_terapeutas">Guardias index</a>


        <div class="col-sm-12">
            {!! Form::open(array('url' => 'turnos_terapeutas')) !!}
                @include ('therapist_guards.form', ['submitButtonText' => 'Crear Guardia'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
