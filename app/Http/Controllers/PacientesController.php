<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Paciente;

class PacientesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $pacientes = Paciente::orderBy('apellido', 'ASC')->get();

        return view('pacientes.index', compact('pacientes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('pacientes.create');

    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
        $paciente = new Paciente;


        $paciente->nombre = $request->get('nombre');
        $paciente->apellido = $request->get('apellido');
        $paciente->dni = $request->get('dni');
        $paciente->telefono = $request->get('telefono');
        $paciente->celular = $request->get('celular');
        $paciente->enviado = $request->get('enviado');
        $paciente->jubilado = $request->get('jubilado');
        $paciente->estudiante = $request->get('estudiante');
        $paciente->ocupacion = $request->get('ocupacion');
        $paciente->domicilio = $request->get('domicilio');
        $paciente->aten_masc = $request->get('aten_masc');
        $paciente->aten_fem = $request->get('aten_fem');
        $paciente->aten_pb = $request->get('aten_pb');
        $paciente->nacimiento = $request->get('nacimiento');




        if ($paciente->save()) {
            return redirect('pacientes');
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
        $paciente = Paciente::findOrFail($id);

        return view('pacientes.edit', compact('paciente'));
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
        $paciente = Paciente::findOrFail($id);

        $paciente->nombre = $request->get('nombre');
        $paciente->apellido = $request->get('apellido');
        $paciente->dni = $request->get('dni');
        $paciente->telefono = $request->get('telefono');
        $paciente->celular = $request->get('celular');
        $paciente->enviado = $request->get('enviado');
        $paciente->jubilado = $request->get('jubilado');
        $paciente->estudiante = $request->get('estudiante');
        $paciente->ocupacion = $request->get('ocupacion');
        $paciente->domicilio = $request->get('domicilio');
        $paciente->aten_masc = $request->get('aten_masc');
        $paciente->aten_fem = $request->get('aten_fem');
        $paciente->aten_pb = $request->get('aten_pb');
        $paciente->nacimiento = $request->get('nacimiento');

        if ($paciente->save()) {
            return redirect('pacientes');
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
        $paciente = Paciente::findOrFail($id);

        if ($paciente->delete()) {
            return redirect('pacientes');
        }
	}

}
