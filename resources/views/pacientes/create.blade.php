@extends('layouts/header')

@section('content')

<div class="container">
    <div class="col-sm-12">
        <h1> Pacientes create page </h1>
    </div>
    <div class="col-sm-12">
        <a href="/terapeutas">Pacientes index</a>

        <div class="col-sm-12">
            {!! Form::open(array('url' => 'pacientes')) !!}

            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('nombre', 'Nombre: ') !!}
                            {!! Form::text('nombre', null, ['class' => 'validate']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('apellido', 'Apellido: ') !!}
                            {!! Form::text('apellido', null, ['class' => 'validate']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('dni', 'D.N.I.: ') !!}
                            {!! Form::text('dni', null, ['class' => 'validate']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('telefono', 'Telefono: ') !!}
                            {!! Form::text('telefono', null, ['class' => 'validate']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('celular', 'Celular: ') !!}
                            {!! Form::text('celular', null, ['class' => 'validate']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('nacimiento', 'Nacimiento: ') !!}
                            {!! Form::input('date', 'nacimiento', date('Y-m-d'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('domicilio', 'Domicilio: ') !!}
                            {!! Form::text('domicilio', null, ['class' => 'validate']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('enviado', 'Enviado Por: ') !!}
                            {!! Form::text('enviado', null, ['class' => 'validate']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('ocupacion', 'Ocupacion: ') !!}
                            {!! Form::text('ocupacion', null, ['class' => 'validate']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('jubilado', 'Jubilado: ') !!}
                            {!! Form::select('jubilado', [ '0' => 'No', '1' => 'Si' ], '0') !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('estudiante', 'Estudiante: ') !!}
                            {!! Form::select('estudiante', [ '0' => 'No', '1' => 'Si' ], '0') !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('aten_masc', 'Atencion Masculina: ') !!}
                            {!! Form::select('aten_masc', [ '0' => 'No', '1' => 'Si' ], '0') !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('aten_fem', 'Atencion Femenina: ') !!}
                            {!! Form::select('aten_fem', [ '0' => 'No', '1' => 'Si' ], '0') !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('aten_pb', 'Atencion Pb: ') !!}
                            {!! Form::select('aten_pb', [ '0' => 'No', '1' => 'Si' ], '0') !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input class="btn btn-sm-3 btn-success form-control" type="submit" value="Guardar Nuevo paciente">
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-block btn-danger" href="/pacientes" role="button">Cancelar</a>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
