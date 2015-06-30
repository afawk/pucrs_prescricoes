<?php namespace App\Http\Controllers;

use App\Atendimento;
use App\Prescricao;

use Illuminate\Http\Request;

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

	public function prescreverAlta(Request $request, $id)
	{
		$data = $request->all();

		if (!isset($data['descr_alta'])) {
			return null;
		}

		$atendimento = Atendimento::
			where('codigo', $id)
			->whereNull('descricao_alta')
			->whereNull('data_fim')
			->update([
			    'descricao_alta' => $data['descr_alta'],
			    'data_fim' => date('Y-m-d H:i:s'),
			]);

		if ($atendimento) {
			return redirect()->route('atendimentoShow', [$id]);
		}

		return redirect()->route('home');
	}

}
