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
                @foreach($patients as $patient)
                <tr>
                    <td>
                        {!! $patient->name !!}
                    </td>
                    <td>
                        {!! $patient->last_name !!}
                    </td>
                    <td>
                        {!! $patient->dni !!}
                    </td>
                    <td>
                        {!! $patient->phone !!}
                    </td>
                    <td>
                        {!! $patient->cell_phone !!}
                    </td>
                    <td>
                        {!! $patient->address !!}
                    </td>
                    <td>
                        {!! $patient->birth_date !!}
                    </td>
                    <td>
                        {!! $patient->send_for !!}
                    </td>
                    <td>
                        @if($patient->retired  === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if($patient->student  === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        {!! $patient->occupation !!}
                    </td>
                    <td>
                        @if($patient->masc_atten === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if($patient->fem_atten === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if($patient->pb_atten === 1)
                            Si
                        @else
                            No
                        @endif
                    </td>


                    <td>
                        {!! Form::open(['method' => 'get', 'route' => ['patients.edit', $patient->id]]) !!}

                            {!! Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['patients.destroy', $patient->id]]) !!}

                            {!! Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <a href="/patients/create">Crear</a>
        </div>
    </div>
    @stop