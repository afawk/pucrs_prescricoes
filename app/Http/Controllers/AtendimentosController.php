<?php namespace App\Http\Controllers;

use App\Atendimento;

class AtendimentosController extends Controller {

	public function index($codUnidade)
	{
		$atendimentos = Atendimento::with('paciente')->where(['cod_unidade' => $codUnidade])->get();
		return view('atendimentos.index', ['atendimentos' => $atendimentos]);
	}

	public function show($codigo)
	{
		$atendimento = Atendimento::with('paciente')->with('unidade')->findOrFail($codigo);
		return view('atendimentos.show', ['atendimento' => $atendimento]);
	}

}
