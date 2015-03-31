@extends('layouts/header')

@section('content')

<div class="col-sm-12">
    <h1> Therapists edit page </h1>
</div>

<div class="col-sm-12">
    <a href="/terapeutas">Terapeutas index</a>

    <div class="col-sm-12">
        {!! Form::model($therapist, (array('method' => 'PATCH', 'route' => ['terapeutas.update', $therapist->id]))) !!}
            @include ('therapists.form', ['submitButtonText' => 'Editar Terapeuta'])
        {!! Form::close() !!}

@stop