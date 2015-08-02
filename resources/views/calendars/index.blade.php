@extends('layouts/header')

@section('content')
<h1>Testing Calendar Index View</h1>

<?php

dd($foo); die();

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1> Calendario mensual </h1>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Domingo</th> <!--0-->
                        <th>Lunes</th> <!--1-->
                        <th>Martes</th> <!--2-->
                        <th>Miercoles</th> <!--3-->
                        <th>Jueves</th> <!--4-->
                        <th>Viernes</th> <!--5-->
                        <th>Sabado</th> <!--6-->
                    </tr>
                </thead>
                <tbody>
                <tr>
                <?php

                $day_of_week_count = $to_day->startOfMonth()->dayOfWeek;
                $day_of_week = $to_day->copy()->startOfMonth()->dayOfWeek;

                $day_of_month = $to_day;

                $start_week_day = 0 + $day_of_week;
                $sunday = 0;

                $day_count = 1;
                $total_days = $to_day->daysInMonth + $start_week_day;




                ?>

                @if ($start_week_day !== 0)
                    @for ($sunday; $sunday < $start_week_day; $sunday++)
                        <td> mes pasado </td>
                        <?php  $day_count = $day_count + 1; ?>
                    @endfor
                @endif

                @for ($day_count; $day_count <= $total_days; $day_count++)
                        @if ($day_of_week_count === 0 OR $day_of_week_count === 6)
                            <td> {{ $day_of_month->day  }} </td>
                        @else
                            <td>
                                {{ $day_of_month}}
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Mañana</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    @if (in_array( $day_of_month, $nwds))
                                                        <th class="danger text-center">FERIADO</th>
                                                    @else
                                                        <th class="success">1</th>
                                                        <th class="success">2</th>
                                                        <th class="success">3</th>
                                                        <th class="danger">4</th>
                                                        <th class="danger">5</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Tarde</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    @if (in_array( $day_of_month, $nwds))
                                                    <th class="danger text-center">FERIADO</th>
                                                    @else
                                                    <th class="success">1</th>
                                                    <th class="success">2</th>
                                                    <th class="success">3</th>
                                                    <th class="danger">4</th>
                                                    <th class="danger">5</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        @endif
                        @if ($day_count%7 === 0)
                            </tr>
                            <tr>
                        @endif
                        <?php   $day_of_week_count = $to_day->addDay()->dayOfWeek;?>
                @endfor
@stop
