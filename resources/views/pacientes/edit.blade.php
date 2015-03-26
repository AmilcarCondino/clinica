@extends('layouts/header')

@section('content')

<div class="col-sm-12">
    <h1> Pacientes edit page </h1>
</div>

<div class="col-sm-12">
    <a href="/pacientes">PAcientes index</a>

    <div class="col-sm-12">
        {!! Form::open(array('method' => 'PATCH', 'route' => ['pacientes.update', $paciente->id])) !!}

        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('nombre', 'Nombre: ') !!}
                        {!! Form::text('nombre', $paciente->nombre, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('apellido', 'Apellido: ') !!}
                        {!! Form::text('apellido', $paciente->apellido, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('dni', 'D.N.I.: ') !!}
                        {!! Form::text('dni', $paciente->dni, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('telefono', 'Telefono: ') !!}
                        {!! Form::text('telefono', $paciente->telefono, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('celular', 'Celular: ') !!}
                        {!! Form::text('celular', $paciente->celular, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('nacimiento', 'Nacimiento: ') !!}
                        {!! Form::input('date', 'nacimiento', $paciente->nacimiento, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('domicilio', 'Domicilio: ') !!}
                        {!! Form::text('domicilio', $paciente->domicilio, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('enviado', 'Enviado Por: ') !!}
                        {!! Form::text('enviado', $paciente->enviado, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('ocupacion', 'Ocupacion: ') !!}
                        {!! Form::text('ocupacion', $paciente->ocupacion, ['class' => 'validate']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('jubilado', 'Jubilado: ') !!}
                        {!! Form::select('jubilado', [ '0' => 'No', '1' => 'Si' ], $paciente->jubilado) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('estudiante', 'Estudiante: ') !!}
                        {!! Form::select('estudiante', [ '0' => 'No', '1' => 'Si' ], $paciente->estudiante) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('aten_masc', 'Atencion Masculina: ') !!}
                        {!! Form::select('aten_masc', [ '0' => 'No', '1' => 'Si' ], $paciente->aten_masc) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('aten_fem', 'Atencion Femenina: ') !!}
                        {!! Form::select('aten_fem', [ '0' => 'No', '1' => 'Si' ], $paciente->aten_fem) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('aten_pb', 'Atencion Pb: ') !!}
                        {!! Form::select('aten_pb', [ '0' => 'No', '1' => 'Si' ], $paciente->aten_pb) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <input class="btn btn-sm-3 btn-success form-control" type="submit" value="Guardar Nuevo Paciente">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-block btn-danger" href="/pacientes" role="button">Cancelar</a>
                </div>
            </div>
        </div>

        {!! Form::close() !!}

        @stop