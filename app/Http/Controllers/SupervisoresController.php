<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Supervisore;

class SupervisoresController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $supervisores = Supervisore::orderBy('apellido', 'ASC')->get();

        return view('supervisores.index', compact('supervisores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('supervisores.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
        $supervisores = new Supervisore;


        $supervisores->nombre = $request->get('nombre');
        $supervisores->apellido = $request->get('apellido');
        $supervisores->telefono = $request->get('telefono');
        $supervisores->celular = $request->get('celular');
        $supervisores->email = $request->get('email');

        if ($supervisores->save()) {
            return redirect('supervisores');
        }
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
        $supervisor = Supervisore::findOrFail($id);

        return view('supervisores.edit', compact('supervisor'));
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
        $supervisor = Supervisore::findOrFail($id);

        $supervisor->nombre = $request->get('nombre');
        $supervisor->apellido = $request->get('apellido');
        $supervisor->telefono = $request->get('telefono');
        $supervisor->celular = $request->get('celular');
        $supervisor->email = $request->get('email');

        if ($supervisor->save()) {
            return redirect('supervisores');
        }
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
        $supervisor = Supervisore::findOrFail($id);

        if ($supervisor->delete()) {
            return redirect('supervisores');
        }
	}

}
