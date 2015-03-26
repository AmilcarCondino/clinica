<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Terapeuta;


class TerapeutasController extends Controller {

    protected $layout = 'layouts.header';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $terapeutas = Terapeuta::orderBy('apellido', 'ASC')->get();

		return view('terapeutas.index', compact('terapeutas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('terapeutas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//

        $terapeuta = new Terapeuta;


        $terapeuta->nombre = $request->get('nombre');
        $terapeuta->apellido = $request->get('apellido');
        $terapeuta->dni = $request->get('dni');
        $terapeuta->telefono = $request->get('telefono');
        $terapeuta->celular = $request->get('celular');
        $terapeuta->ano_de_cursada = $request->get('ano_de_cursada');
        $terapeuta->email = $request->get('email');

        if ($terapeuta->save()) {
            return redirect('terapeutas');
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
        $terapeuta = Terapeuta::findOrFail($id);

        return view('terapeutas.edit', compact('terapeuta'));
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
        $terapeuta = Terapeuta::findOrFail($id);

        $terapeuta->nombre = $request->get('nombre');
        $terapeuta->apellido = $request->get('apellido');
        $terapeuta->dni = $request->get('dni');
        $terapeuta->telefono = $request->get('telefono');
        $terapeuta->celular = $request->get('celular');
        $terapeuta->ano_de_cursada = $request->get('ano_de_cursada');
        $terapeuta->email = $request->get('email');

        if ($terapeuta->save()) {
            return redirect('terapeutas');
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
        $terapeuta = Terapeuta::findOrFail($id);

        if ($terapeuta->delete()) {
            return redirect('terapeutas');
        }
	}

}
