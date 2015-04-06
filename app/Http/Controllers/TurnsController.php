<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Turn;

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


class TurnsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $first_date = Carbon::today()->startOfMonth()->subWeek();
        $last_date = Carbon::today()->endOfMonth()->addWeek();
        $today = Carbon::today()->addDays(6);

        $turns = $this->liableTurns();
        $therapists = Therapist::all();

        $turn = $this->therapistGuards(4);


        return view('turns.index', compact('therapists', 'turns', 'therapist_guards', 'turn'));

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


    /**
     *
     * Generate a list of days starting one week
     * before and ending ona week after the
     * actual date.
     *
     *
     * @return array
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

    /**
     *
     * Create an array of of liable days for turns.
     *
     * @return array
     */
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

    public function therapistGuards ($therapist)
    {
        //@TODO make a god method of date range analise selection.

        //Determine the range dates to analise
        $start_date = Carbon::today();
        $end_date = Carbon::today()->endOfMonth()->addWeek();

        //Instantiate the needed object

        $therapist_guards = TherapistGuard::where('therapist_id', $therapist)->get();

        //Create an empty array to populate
        $turns = [];

        foreach ($therapist_guards as $therapist_guard)
        {
            $therapist_start_guard_date = Carbon::parse($therapist_guard->start_date);
            $therapist_end_guard_date = Carbon::parse($therapist_guard->end_date);

            $key = $therapist_guard->therapist->name;

            //List of gards Week Days--------------->
            $guards_week_days = [];
            if ($therapist_guard->monday == 1)
            {
                $guards_week_days[] = 1;
            }
            if ($therapist_guard->tuesday == 2)
            {
                $guards_week_days[] = 2;
            }
            if ($therapist_guard->wednesday == 3)
            {
                $guards_week_days[] = 3;
            }
            if ($therapist_guard->thursday == 4)
            {
                $guards_week_days[] = 4;
            }
            if ($therapist_guard->friday == 5)
            {
                $guards_week_days[] = 5;
            }
            //<-----------------List of gards Week Days

            //List of analise dates
            $days_list = [];
            while ($start_date <= $end_date)
            {
                $start_date = $start_date->addDay();
                $days_list[] = $start_date->copy();
            }




            //List of therapist guards dates
            while ($therapist_start_guard_date <= $therapist_end_guard_date)
            {
                $therapist_start_guard_date = $therapist_start_guard_date->addDay();
                if (in_array($therapist_start_guard_date->dayOfWeek, $guards_week_days))
                {
                    if (!in_array($therapist_start_guard_date, $this->nonWorkingDays()))
                    {
                        $turns[] = $therapist_start_guard_date->copy();
                    }
                }
            }
        }

        return $turns;






    }

}
