<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\NonWorkingDays;

class NonWorkingDaysController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $non_working_days = NonWorkingDays::orderBy('date', 'ASC')->get();

        return view('non_working_days.index', compact('non_working_days'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('non_working_days.create');
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

        NonWorkingDays::create($input);

        return redirect('dias_no_laborales');
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
        $non_working_day = NonWorkingDays::findOrFail($id);

        return view('non_working_days.edit', compact('non_working_day'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//
        $non_working_day = NonWorkingDays::findOrFail($id);
        $input = Request::all();

        $non_working_day->update($input);

        return redirect('dias_no_laborales');
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
        $non_working_day = NonWorkingDays::findOrFail($id);

        if ($non_working_day->delete()) {
            return redirect('dias_no_laborales');
        }
	}

}
