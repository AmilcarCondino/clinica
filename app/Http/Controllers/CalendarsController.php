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
use Jenssegers\Date\Date;
use App\Turn;


class CalendarsController extends Controller {

    public function index()
    {
        $free_turns = Turn::freeTurns();

        $foo = Turn::all();

        $reservas = json_encode($this->calendarReservedTurns($foo));

        $libres =  json_encode($this->calendarFreeTurns($free_turns));

        $completa = json_encode($this->calendarCompleta($free_turns, $foo));

        return view('calendars.index', compact('libres', 'reservas', 'completa'));

    }



    public function calendarFreeTurns($turns)
    {
        $list = [];

        foreach ($turns as $i => $free_turn)
        {
            $therapist = Therapist::where('id', $i)->first();

            foreach ($free_turn as $turn)
            {
                foreach ($turn as $date => $carbon)
                {
                    $search = ' ';
                    $replace = 'T';
                    $start = str_replace($search, $replace, $date);
                    $end = str_replace($search, $replace, $carbon->addHour()->toDateTimeString());

                    $list[] = array(
                        "title" => $therapist->name,
                        "start" => $start,
                        "end"   => $end,
                        "backgroundColor" => "green"
                    );

                }
            }
        }
        return $list;
    }

    public function calendarReservedTurns($turns)
    {
        $list = [];

        foreach ($turns as $turn)
        {
            $search = ' ';
            $replace = 'T';
            $start = str_replace($search, $replace, $turn->appointment);
            $carbon = Carbon::parse($start);
            $end = str_replace($search, $replace, $carbon->addHour()->toDateTimeString());
            $therapist = Therapist::where('id', $turn->therapist_id)->first();
            $patient = Patient::where('id', $turn->patient_id)->first();

            $list[] = array(
                "title" => $therapist->nam.' - '.$patient->last_name,
                "start" => $start,
                "end"   => $end,
                "backgroundColor" => "red"
            );
        }
        return $list;
    }

    public function calendarCompleta($reserved, $free)
    {
        $list = [];

        foreach ($reserved as $i => $free_turn)
        {
            $therapist = Therapist::where('id', $i)->first();

            foreach ($free_turn as $turn)
            {
                foreach ($turn as $date => $carbon)
                {
                    $search = ' ';
                    $replace = 'T';
                    $start = str_replace($search, $replace, $date);
                    $end = str_replace($search, $replace, $carbon->addHour()->toDateTimeString());

                    $list[] = array(
                        "title" => $therapist->name,
                        "start" => $start,
                        "end"   => $end,
                        "backgroundColor" => "green"
                    );

                }
            }
        }

        foreach ($free as $turn)
        {
            $search = ' ';
            $replace = 'T';
            $start = str_replace($search, $replace, $turn->appointment);
            $carbon = Carbon::parse($start);
            $end = str_replace($search, $replace, $carbon->addHour()->toDateTimeString());
            $therapist = Therapist::where('id', $turn->therapist_id)->first();
            $patient = Patient::where('id', $turn->patient_id)->first();

            $list[] = array(
                "title" => $therapist->name.' - '.$patient->last_name,
                "start" => $start,
                "end"   => $end,
                "backgroundColor" => "red"
            );
        }

        return $list;
    }


}
