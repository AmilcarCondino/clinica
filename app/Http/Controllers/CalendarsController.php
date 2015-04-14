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


    $array = array(
                    array(
                        "title" => "turno libre",
                        "start" => "2015-04-13T09:00:00",
                        "end" => "2015-04-13T10:00:00",
                        "backgroundColor" => "green"
                    ),
                    array(
                        "title" => "turno libre",
                        "start" => "2015-04-13T10:00:00",
                        "end" => "2015-04-13T11:00:00",
                        "backgroundColor" => "green"
                    ),
                    array(
                        "title" => "Perez",
                        "start" => "2015-04-13T11:00:00",
                        "end" => "2015-04-13T12:00:00",
                        "backgroundColor" => "red"
                    ),
                    array(
                        "title" => "turno libre",
                        "start" => "2015-04-13T15:00:00",
                        "end" => "2015-04-13T16:00:00",
                        "backgroundColor" => "red"
                    ),
                    array(
                        "title" => "Perez",
                        "start" => "2015-04-13T16:00:00",
                        "end" => "2015-04-13T17:00:00",
                        "backgroundColor" => "red"
                    ),
                    array(
                        "title" => "turno libre",
                        "start" => "2015-04-13T17:00:00",
                        "end" => "2015-04-13T18:00:00",
                        "backgroundColor" => "red"
                    )

    );


//dd(json_encode($array));

        $foo =  $this->calendarList();

        dd($foo);

        return view('calendars.index', compact('array'));

    }



    public function calendarList()
    {
        $free_turns = Turn::freeTurns();




        $calendar_list = [];

        foreach ($free_turns as $i => $free_turns)
        {
            $therapist = Therapist::where('id', $i)->get();
            dd($therapist->name);
        }
    }


}
