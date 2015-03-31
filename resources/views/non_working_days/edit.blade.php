@extends('layouts/header')

@section('content')

<div class="col-sm-12">
    <h1> Dias No Laborales edit page </h1>
</div>

<div class="col-sm-12">
    <a href="/dias_no_laborales">Pacientes index</a>

    <div class="col-sm-12">
        {!! Form::model($non_working_day,array('method' => 'PATCH', 'route' => ['dias_no_laborales.update', $non_working_day->id])) !!}
            @include('non_working_days.form', ['submitButtonText' => 'Editar Dia'])
        {!! Form::close() !!}

        @stop