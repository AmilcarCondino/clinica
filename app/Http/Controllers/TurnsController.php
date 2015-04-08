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

        $turn = $this->liableTurns();

        $therapists_id = 3;

        $therapist_guards = TherapistGuard::where('therapist_id', $therapists_id)->get();


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
        $therapists = Therapist::lists('name', 'id');
        $patients = null;
        $therapist = null;



        return view('turns.create', compact('therapists', 'therapist', 'patients'));
	}

    public function selectTherapist()
    {
        //
        $input = Request::all();



        $therapist = Request::input('therapist_id');

        if (!empty ($therapist))
        {
            $therapists = Therapist::lists('name', 'id');
            $patients = Patient::lists('name', 'id');
            $liable_turns = $this->liableTurns();
            $appointment = $liable_turns[$therapist];
            $office_id = Office::lists('number', 'id');

            return view('turns.turn', compact('therapists', 'therapist', 'patients', 'appointment', 'office_id'));
        }

    }

    public function turn()
    {
        //
        $therapists = Therapist::lists('name', 'id');

        $therapist = null;



        return view('turns.create', compact('therapists', 'therapist'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $input = Request::all();

        Turn::create($input);

        return redirect('turnos');

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

        //@TODO not hard code the first and end dates. Check the first date.

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

        //@TODO make a god method of date range analise selection.
        //@TODO substract alllready taken turns.

        //Determine the range dates to analise
        $first_date = Carbon::today()->startOfMonth()->subWeek();
        $end_date = Carbon::today()->endOfMonth()->addWeek();

        //Instantiate the needed object
        $therapists = Therapist::all();

        //Create an empty array to populate
        $turns = [];

        foreach ($therapists as $therapist)
        {
            $therapist_guards = TherapistGuard::where('therapist_id', $therapist->id)->get();

            foreach ($therapist_guards as $therapist_guard)
            {
                $start_date = Carbon::parse($therapist_guard->start_date);
                $end_date = Carbon::parse($therapist_guard->end_date);

                $key = $therapist_guard->therapist->id;
                if ($therapist_guard->turn == 0)
                {
                    $hour = 'Mañana';
                }
                if ($therapist_guard->turn == 1)
                {
                    $hour = 'Tarde';
                }


                //List of guards Week Days--------------->
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
                //<-----------------List of guards Week Days


                $days_list = [];
                while ($start_date <= $end_date)
                {
                    $hm = 9;
                    while ($hm <= 11)
                    {
                        $d =  $start_date->copy();
                        $days_list[] = $d->hour($hm);
                        $hm++;
                    }
                    $ht = 14;
                    while ($ht <= 16)
                    {
                        $d =  $start_date->copy();
                        $days_list[] = $d->hour($ht);
                        $ht++;
                    }
                    $start_date->addDay();
                }


                $liable_turn = [];
                foreach ($days_list as $day)
                {
                    if (in_array($day->dayOfWeek, $guards_week_days))
                    {
                        if (!in_array($day, $this->nonWorkingDays()))
                        {
                            $liable_turn[$day->toDateString()] = $day;
                        }
                    }
                }
                $turns[$key][$hour] =  $liable_turn;
            }
        }

        return $turns;
    }
}
