@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Conultorios create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/offices">Spuervisores index</a>

        <div class="col-sm-12">
            {!! Form::open(array('url' => 'offices')) !!}
                <div class="col-sm-6">
                    {!! Form::label('number', 'Numero: ') !!}
                    {!! Form::text('number', null, ['class' => 'validate']) !!}
                </div>
            <div class="col-sm-6">
                {!! Form::submit('crear', ['class' => 'btn btn-sm-3 btn-success form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@stop

