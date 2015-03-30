@extends('layouts/header')

@section('content')

<div class="col-sm-12">
    <h1> Pacientes edit page </h1>
</div>

<div class="col-sm-12">
    <a href="/patients">Pacientes index</a>

    <div class="col-sm-12">
        {!! Form::model($patient,array('method' => 'PATCH', 'route' => ['patients.update', $patient->id])) !!}
            @include('patients.form', ['submitButtonText' => 'Editar Terapeuta'])
        {!! Form::close() !!}

        @stop