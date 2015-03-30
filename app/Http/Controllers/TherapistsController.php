<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Therapist;


class TherapistsController extends Controller {

    protected $layout = 'layouts.header';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $therapists = Therapist::orderBy('last_name', 'ASC')->get();

		return view('therapists.index', compact('therapists'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('therapists.create');
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

        Therapist::create($input);

        return redirect('therapists');


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
        $therapist = Therapist::findOrFail($id);

        return view('therapists.edit', compact('therapist'));
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


        $therapist = Therapist::findOrFail($id);
        $input = Request::all();

        $therapist->update($input);

        return redirect('therapists');

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
        $therapist = Therapist::findOrFail($id);

        if ($therapist->delete()) {
            return redirect('therapists');
        }
	}

}
