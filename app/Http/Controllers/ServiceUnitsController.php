<?php namespace App\Http\Controllers;

class ServiceUnitsController extends Controller {

	/**
	 * Show the list of available service units to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view('service_units.index', ['unidades' => Unidade::all()]);

		$unidades = [
			(object)array('id' => 1, 'nome' => 'Unidade 1')
		];
		return view('service_units.index', ['unidades' => $unidades]);
	}

}
