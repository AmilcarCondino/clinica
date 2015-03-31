<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Supervisor;

class SupervisorsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $supervisors= Supervisor::orderBy('last_name', 'ASC')->get();

        return view('supervisors.index', compact('supervisors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('supervisors.create', compact('supervisors'));
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

        Supervisor::create($input);

        return redirect('supervisores');
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
        $supervisor = Supervisor::findOrFail($id);

        return view('supervisors.edit', compact('supervisor'));
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
        $supervisor = Supervisor::findOrFail($id);
        $input = Request::all();

        $supervisor->update($input);

        return redirect('supervisores');

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
        $supervisor = Supervisor::findOrFail($id);

        if ($supervisor->delete()) {
            return redirect('supervisores');
        }
	}

}
