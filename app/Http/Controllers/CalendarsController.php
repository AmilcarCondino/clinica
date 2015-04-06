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


class CalendarsController extends Controller {

    public function index()
    {

        $first_date = Carbon::today()->startOfMonth()->subWeek();
        $last_date = Carbon::today()->endOfMonth()->addWeek();


        $turns = $this->liableTurns();



        return view('calendars.index', compact('therapists', 'turns'));

    }

    /**
     *
     * Generate a list of days starting one week
     * before and ending ona week after the
     * actual date
     *
     * @return mixed
     */
    public function showingDays()
    {

        //@TODO not hardcod the first and end dates. Check the first date.

        $first_date = Carbon::today()->startOfMonth()->subWeek();
        $end_date = Carbon::today()->endOfMonth()->addWeek();
        $showingDays = [];


        while ($first_date <= $end_date)
        {
            $first_date = $first_date->addDay();
            $showingDays[] = $first_date->copy();
        }



        return $showingDays;
    }

    /**
     * Create a list of non working days, merging
     * weekends and holidays.
     *
     * @return array
     */
    public function nonWorkingDays ()
    {
        //@TODO not hardcod the first and end dates. Check the first date.

        //Determine the range dates to analise
        $first_date = Carbon::today()->startOfMonth()->subWeek();
        $end_date = Carbon::today()->endOfMonth()->addWeek();

        //Make a list of the weekends in the given range
        $days_list = [];
        while ($first_date <= $end_date)
        {
            $first_date = $first_date->addDay();

            if ( $first_date->isWeekend() )
            {
                $days_list[] = $first_date->copy();
            }

        }

        //Sum a list of holidays to the list.

        $first = Carbon::today()->startOfMonth()->subWeek();
        $end = Carbon::today()->endOfMonth()->addWeek();
        $non_working_days = NonWorkingDays::whereBetween('date', [$first, $end])->get();
        foreach ($non_working_days as $non_working_day)
        {
            if ($non_working_day->holiday == 1)
            {
                $days_list[] = Carbon::parse($non_working_day->date);
            }
        }

        return $days_list;

    }

    public function liableTurns ()
    {

        //Determine the range dates to analise
        $first_date = Carbon::today()->startOfMonth()->subWeek();
        $end_date = Carbon::today()->endOfMonth()->addWeek();

        //Instantiate the needed object
        $therapists = Therapist::all();
        $therapist_guards = TherapistGuard::all();

        //Create an empty array to populate
        $turns = [];

        foreach ($therapist_guards as $therapist_guard)
        {
            $start_date = Carbon::parse($therapist_guard->start_date);
            $end_date = Carbon::parse($therapist_guard->end_date);

            $key = $therapist_guard->therapist->name;

            $days_list = [];
            while ($start_date <= $end_date)
            {
                $start_date = $start_date->addDay();
                $days_list[] = $start_date->copy();
            }

            $liable_turn = [];
            foreach ($days_list as $day)
            {
                if (in_array($day, $this->showingDays()))
                {
                    if (!in_array($day, $this->nonWorkingDays()))
                    {
                        $liable_turn[] = $day;
                    }
                }
            }

            $turns[$key] =  $liable_turn;

        }

        return $liable_turn;


    }


}
