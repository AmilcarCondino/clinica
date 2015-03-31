@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Supervisores create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/supervisors">Spuervisores index</a>

        <div class="col-sm-12">
            {!! Form::open(array('url' => 'supervisores')) !!}
                @include('supervisors.form', ['submitButtonText' => 'Crear Supervisor'])
            {!! Form::close() !!}
        </div>
    </div>
</div>

@stop

