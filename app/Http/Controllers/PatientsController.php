<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Patient;

class PatientsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $patients = Patient::orderBy('last_name', 'ASC')->get();

        return view('patients.index', compact('patients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('patients.create');

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

        Patient::create($input);

        return redirect('pacientes');

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
        $patient = Patient::findOrFail($id);

        return view('patients.edit', compact('patient'));
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
        $patient = Patient::findOrFail($id);
        $input = Request::all();

        $patient->update($input);

        return redirect('pacientes');
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
        $patient = Patient::findOrFail($id);

        if ($patient->delete()) {
            return redirect('pacientes');
        }
	}

}
