@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Terapeutas create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/terapeutas">Terapeutas index</a>

        <div class="col-sm-12">
            {!! Form::open(['url' => 'terapeutas']) !!}
                @include ('therapists.form', ['submitButtonText' => 'Crear Terapeuta'])
            {!! Form::close() !!}
        </div>
    </div>
</div>

@stop

