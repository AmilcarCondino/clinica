<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Request;
use App\Calendar;
use App\NonWorkingDays;
use App\Office;
use App\Patient;
use App\Supervisor;
use App\Therapist;
use App\TherapistGuard;



class CalendarsController extends Controller {

    public function index()
    {

        $today = Carbon::today();
        $first_date = $today->addWeekdays(-15);
        $end_date = $today->addWeekdays(15);


        $list_days = [];

        while ($today <= $end_date) {

            $list_days = $today;

            $today = $today->addDay();

            }


        if ($today->dayOfWeek == Carbon::MONDAY) {
            $day = 'Lunes';
        }
        if ($today->dayOfWeek == Carbon::THURSDAY) {
            $day = 'Jueves';
        }
        if ($today->dayOfWeek == Carbon::WEDNESDAY) {
            $day = 'Miercoles';
        }
        if ($today->dayOfWeek == Carbon::TUESDAY) {
            $day = 'Martes';
        }
        if ($today->dayOfWeek == Carbon::FRIDAY) {
            $day = 'Viernes';
        }
        if ($today->dayOfWeek == Carbon::SATURDAY) {
            $day = 'Sabado';
        }
        if ($today->dayOfWeek == Carbon::SUNDAY) {
            $day = 'Domingo';
        }


dd($list_days);

        return view('calendars.index', compact('date', 'day', 'today', 'end_date'));

    }

    public function laborable_days()
    {
        //Quiero generar un listado de 15 dias anteriores y 15 dias
        //posteriores labrables a la fecha actual.



        return $show_working_days;
    }



}
