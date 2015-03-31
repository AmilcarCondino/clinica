@extends('layouts/header')

@section('content')

<div class="col-sm-12">
    <h1> Supervisores edit page </h1>
</div>

<div class="col-sm-12">
    <a href="/supervisores">Supervisores index</a>

    <div class="col-sm-12">
        {!! Form::model($supervisor,array('method' => 'PATCH', 'route' => ['supervisores.update', $supervisor->id])) !!}
            @include('supervisors.form', ['submitButtonText' => 'Editar Supervisor'])
        {!! Form::close() !!}

        @stop