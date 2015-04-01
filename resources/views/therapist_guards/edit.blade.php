@extends('layouts/header')

@section('content')

<div class="col-sm-12">
    <h1> Pacientes edit page </h1>
</div>

<div class="col-sm-12">
    <a href="/turnos_terapeutas">Guardias index</a>

    <div class="col-sm-12">
        {!! Form::model($therapist_guard,array('method' => 'PATCH', 'route' => ['turnos_terapeutas.update', $therapist_guard->id])) !!}
        @include('therapist_guards.form', ['submitButtonText' => 'Editar Guardia'])
        {!! Form::close() !!}

        @stop