@extends('layouts/header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1> Lista de Therapists </h1>
        </div>
    </div>
    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th>Terapeuta</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha de Final</th>
                    <th>Turno</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>

                </tr>
                </thead>
                <tbody>
                @foreach($therapist_guards as $therapist_guard)
                <tr>
                    <td>
                        {{ $therapist_guard->therapist->name}}
                    </td>
                    <td>
                        {{ $therapist_guard->start_date }}
                    </td>
                    <td>
                        {{ $therapist_guard->end_date }}
                    </td>
                    <td>
                        @if($therapist_guard->turn === 1)
                            Tarde
                        @else
                            Mañana
                        @endif
                    </td>
                    <td>
                        @if($therapist_guard->monday === 1)
                        Si
                        @endif
                    </td>
                    <td>
                        @if($therapist_guard->tuesday === 1)
                        Si
                        @endif
                    </td>
                    <td>
                        @if($therapist_guard->wednesday === 1)
                        Si
                        @endif
                    </td>
                    <td>
                        @if($therapist_guard->thursday === 1)
                        Si
                        @endif
                    </td>
                    <td>
                        @if($therapist_guard->friday === 1)
                        Si
                        @endif
                    </td>


                    <td>
                        {!! Form::open(['method' => 'get', 'route' => ['turnos_terapeutas.edit', $therapist_guard->id]]) !!}

                        {!! Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['turnos_terapeutas.destroy', $therapist_guard->id]]) !!}

                        {!! Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <a href="/turnos_terapeutas/create">Crear</a>
        </div>
    </div>
    @stop