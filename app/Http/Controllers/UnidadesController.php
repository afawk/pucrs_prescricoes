<?php namespace App\Http\Controllers;

use App\Unidade;

class UnidadesController extends Controller {

	public function index()
	{
		return view('unidades.index', ['unidades' => Unidade::all()]);
	}

}
