@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Dias No Laborales create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/dias_no_laborales">Dias No Laborales index</a>

        <div class="col-sm-12">
            {!! Form::open(array('url' => 'dias_no_laborales')) !!}
                @include ('non_working_days.form', ['submitButtonText' => 'Anular Dia'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
