@extends('layouts/header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1> Dias de No Atencion </h1>
        </div>
    </div>
    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Feriado</th>
                    <th>Ateneo</th>
                    <th>Curso</th>
                    <th>Aclaracines</th>

                </tr>
                </thead>
                <tbody>
                @foreach($non_working_days as $non_working_day)
                <tr>
                    <td>
                        {{ $non_working_day->date }}
                    </td>
                    <td>
                        @if($non_working_day->holiday === 1)
                        Si
                        @else
                        No
                        @endif
                    </td>
                    <td>
                        @if($non_working_day->ateneo === 1)
                        Si
                        @else
                        No
                        @endif
                    </td>
                    <td>
                        {{ $non_working_day->course }}
                    </td>
                    <td>
                        {{ $non_working_day->note }}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'get', 'route' => ['dias_no_laborales.edit', $non_working_day->id]]) !!}

                        {!! Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['dias_no_laborales.destroy', $non_working_day->id]]) !!}

                        {!! Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <a href="/dias_no_laborales/create">Crear</a>
        </div>
    </div>
    @stop