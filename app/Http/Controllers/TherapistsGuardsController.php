<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\TherapistGuard;
use App\Therapist;

class TherapistsGuardsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $therapist_guards = TherapistGuard::orderBy('therapist_id', 'ASC')->get();

        return view('therapist_guards.index', compact('therapist_guards', 'thera'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        $therapists_id = Therapist::lists('last_name', 'id');

        return view('therapist_guards.create', compact('therapists_id'));

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
        TherapistGuard::create($input);

        return redirect('turnos_terapeutas');
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
        $therapist_guard = TherapistGuard::findOrFail($id);

        return view('therapist_guards.edit', compact('therapist_guard'));
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
        $therapist_guard = TherapistGuard::findOrFail($id);
        $therapists_id = Therapist::lists('last_name', 'id');


        return view('therapist_guards.edit', compact('therapist_guard', 'therapists_id'));

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
        $therapist_guard = TherapistGuard::findOrFail($id);
        $input = Request::all();

        $therapist_guard->update($input);

        return redirect('turnos_terapeutas');
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
        $therapist_guard = TherapistGuard::findOrFail($id);

        if ($therapist_guard->delete()) {
            return redirect('turnos_terapeutas');
        }
	}

}
