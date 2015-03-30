@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Pacientes create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/therapists">Pacientes index</a>

        <div class="col-sm-12">
            {!! Form::open(array('url' => 'patients')) !!}
                @include ('patients.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
