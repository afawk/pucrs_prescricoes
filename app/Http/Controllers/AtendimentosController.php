<?php namespace App\Http\Controllers;

use App\Atendimento;
use App\Prescricao;

class AtendimentosController extends Controller {

	public function index($codUnidade)
	{
		$atendimentos = Atendimento::with('paciente')
			->where('cod_unidade', $codUnidade)
			->get();

		return view('atendimentos.index', ['atendimentos' => $atendimentos]);
	}

	public function show($codigo)
	{
		$atendimento = Atendimento::with('paciente')
			->with('unidade')
			->where('codigo', $codigo)
			->first();

		$prescricoesList = Prescricao::with('Atendimento')
            ->where('cod_atendimento', $codigo)
            ->get();

		return view('atendimentos.show', [
		    'atendimento' => $atendimento,
		    'prescricoes_lista' => $prescricoesList,
		]);
	}

}
