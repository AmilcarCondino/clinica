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
        //Index ----------------------->
        $therapists = Therapist::all();
        $appointments = Turn::orderBy('appointment', 'ASC')->get();

        return view('turns.index', compact('therapists', 'appointments'));
        //<----------------------

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
            $liable_turns = $this->freeTurns();
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
        $turn = Turn::findOrFail($id);

        if ($turn->delete()) {
            return redirect('turnos');
        }
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
            $hm = 9;
            while ($hm <= 11)
            {
                $d =  $first_date->copy();
                $showingDays[] = $d->hour($hm);
                $hm++;
            }
            $ht = 14;
            while ($ht <= 16)
            {
                $d =  $first_date->copy();
                $showingDays[] = $d->hour($ht);
                $ht++;
            }
            $first_date = $first_date->addDay();
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
            if ( $first_date->isWeekend() )
            {
                $hm = 9;
                while ($hm <= 11)
                {
                    $d =  $first_date->copy();
                    $days_list[] = $d->hour($hm);
                    $hm++;
                }
                $ht = 14;
                while ($ht <= 16)
                {
                    $d =  $first_date->copy();
                    $days_list[] = $d->hour($ht);
                    $ht++;
                }
            }
            $first_date ->addDay();
        }

        //Sum a list of holidays to the list.

        $first = Carbon::today()->startOfMonth()->subWeek();
        $end = Carbon::today()->endOfMonth()->addWeek();
        $non_working_days = NonWorkingDays::whereBetween('date', [$first, $end])->get();
        foreach ($non_working_days as $non_working_day)
        {
            if ($non_working_day->holiday == 1)
            {
                $nwd = Carbon::parse($non_working_day->date);
                $hm = 9;
                while ($hm <= 11)
                {
                    $d =  $nwd->copy();
                    $days_list[] = $d->hour($hm);
                    $hm++;
                }
                $ht = 14;
                while ($ht <= 16)
                {
                    $d =  $nwd->copy();
                    $days_list[] = $d->hour($ht);
                    $ht++;
                }
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
    public function openGuards()
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
                    $hour = 'Manana';
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
                        if (in_array($day, $this->showingDays()))
                        {
                            if (!in_array($day, $this->nonWorkingDays()))
                            {
                                if ($hour == 'Manana')
                                {
                                    if ($day->hour == 9)
                                    {
                                        $liable_turn[$day->toDateTimeString()] = $day;
                                    }
                                    if ($day->hour == 10)
                                    {
                                        $liable_turn[$day->toDateTimeString()] = $day;
                                    }
                                    if ($day->hour == 11)
                                    {
                                        $liable_turn[$day->toDateTimeString()] = $day;
                                    }
                                }
                                if ($hour == 'Tarde')
                                {
                                    if ($day->hour == 14)
                                    {
                                        $liable_turn[$day->toDateTimeString()] = $day;
                                    }
                                    if ($day->hour == 15)
                                    {
                                        $liable_turn[$day->toDateTimeString()] = $day;
                                    }
                                    if ($day->hour == 16)
                                    {
                                        $liable_turn[$day->toDateTimeString()] = $day;
                                    }
                                }
                            }
                        }
                    }
                }
                $turns[$key][$hour] =  $liable_turn;
            }
        }
        return $turns;
    }

    public function ateneo()
    {
        $ateneos = NonWorkingDays::whereBetween('course', [1, 5])->get();
        $freeGuards = $this->openGuards();

        foreach ($ateneos as $ateneo)
        {
            $therapists = Therapist::where('career_year', $ateneo->course)->get();

            foreach ($therapists as $therapist)
            {

                if (array_key_exists($therapist->id, $freeGuards));
                {
                    $ther_id_array = $freeGuards[$therapist->id];
                    $m = 'Manana';
                    if (array_key_exists($m, $ther_id_array))
                    {
                        $turn_array = $freeGuards[$therapist->id]['Manana'];
                        $date9 = Carbon::parse($ateneo->date)->hour(9);
                        $date = $date9->toDateTimeString();
                        if (in_array($date, $turn_array))
                        {
                            unset($freeGuards[$therapist->id]['Manana'][$date]);
                        }$date10 = Carbon::parse($ateneo->date)->hour(10);
                        $date = $date10->toDateTimeString();
                        if (in_array($date, $turn_array))
                        {
                            unset($freeGuards[$therapist->id]['Manana'][$date]);
                        }$date11 = Carbon::parse($ateneo->date)->hour(11);
                        $date = $date11->toDateTimeString();
                        if (in_array($date, $turn_array))
                        {
                            unset($freeGuards[$therapist->id]['Manana'][$date]);
                        }

                    }
                    $t = 'Tarde';
                    if (array_key_exists($t, $ther_id_array))
                    {
                        $turn_array = $freeGuards[$therapist->id]['Tarde'];
                        $date14 = Carbon::parse($ateneo->date)->hour(14);
                        $date = $date14->toDateTimeString();
                        if (in_array($date, $turn_array))
                        {
                            unset($freeGuards[$therapist->id]['Tarde'][$date]);
                        }$date15 = Carbon::parse($ateneo->date)->hour(15);
                        $date = $date15->toDateTimeString();
                        if (in_array($date, $turn_array))
                        {
                            unset($freeGuards[$therapist->id]['Tarde'][$date]);
                        }$date16 = Carbon::parse($ateneo->date)->hour(16);
                        $date = $date16->toDateTimeString();
                        if (in_array($date, $turn_array))
                        {
                            unset($freeGuards[$therapist->id]['Tarde'][$date]);
                        }
                    }
                }

            }

        }

        return $freeGuards;
    }


    public function freeTurns()
    {
        $guards = $this->ateneo();
        $appointments = Turn::all();


        foreach ($appointments as $appointment)
        {
            if ($appointment->turn == 0)
            {
                $turn = 'Manana';
            } else {
                $turn = 'Tarde';
            }
            unset($guards[$appointment->therapist_id][$turn][$appointment->appointment]);
        }
        return $guards;

    }



}
