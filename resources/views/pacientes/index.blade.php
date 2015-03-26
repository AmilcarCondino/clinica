@extends('layouts/header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1> Lista de Pacientes </h1>
        </div>
    </div>
    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Domicilio</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Enviado por</th>
                    <th>Jubilado</th>
                    <th>Estudiante</th>
                    <th>Ocupacion</th>
                    <th>Atencion Masculina</th>
                    <th>Atencion Femenina</th>
                    <th>Atencion en Pb</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pacientes as $paciente)
                <tr>
                    <td>
                        {!! $paciente->nombre !!}
                    </td>
                    <td>
                        {!! $paciente->apellido !!}
                    </td>
                    <td>
                        {!! $paciente->dni !!}
                    </td>
                    <td>
                        {!! $paciente->telefono !!}
                    </td>
                    <td>
                        {!! $paciente->celular !!}
                    </td>
                    <td>
                        {!! $paciente->domicilio !!}
                    </td>
                    <td>
                        {!! $paciente->nacimiento !!}
                    </td>
                    <td>
                        {!! $paciente->enviado !!}
                    </td>
                    <td>
                        @if($paciente->jubilado  === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if($paciente->estudiante  === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        {!! $paciente->ocupacion !!}
                    </td>
                    <td>
                        @if($paciente->aten_masc === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if($paciente->aten_fem === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if($paciente->aten_pb === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>


                    <td>
                        {!! Form::open(['method' => 'get', 'route' => ['pacientes.edit', $paciente->id]]) !!}

                        {!! Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['pacientes.destroy', $paciente->id]]) !!}

                        {!! Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <a href="/pacientes/create">Crear</a>
        </div>
    </div>
    @stop