<?php namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Atendimento;
use App\Paciente;
use App\Prescricao;
use App\Business\PrescricoesFactory;

class PrescricoesController extends Controller {

	/**
	 * Visualiza a prescrição atual do paciente
	 *
	 * @param  int  $idAtendimento
	 * @return Response
	 */
	public function index($idAtendimento)
	{
		$prescricao = Prescricao::with('Paciente')
			->with('Atendimento')
			->with('Unidade')
			->with('Medicamentos')
			->with('Medico')
			->where(['cod_atendimento' => $idAtendimento])
			->first();

		return view('prescricoes.index', ['prescricao' => $prescricao]);
	}

	/**
	 * Mostra o formulário para criação de novas prescrições para o paciente
	 *
	 * @param  int  $idAtendimento
	 * @return Response
	 */
	public function create($idAtendimento)
	{
		$atendimento = Atendimento::with('paciente')
			->where(['codigo' => $idAtendimento])
			->first();

		return view('prescricoes.create', ['atendimento' => $atendimento]);
	}

	/**
	 * Salva uma nova prescrição
	 *
	 * @param  int  $idAtendimento
	 * @return Response
	 */
	public function store(Request $request, $idAtendimento)
	{
		$data = $request->all();
		unset($data['_token']);

		$data['crm_medico']      = Auth::user()->crm;
		$data['cod_atendimento'] = $idAtendimento;

		$prescricaoCreate = new PrescricoesFactory($data);
		$ids = $prescricaoCreate->create();

		if (isset($ids['prescricao'])) {
			return redirect()->route('visualizarPrescricao', [$idAtendimento, $ids['prescricao']]);
		}
	}

	/**
	 * Mostra uma prescrição especifica
	 *
	 * @param  int  $idAtendimento
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idAtendimento, $id)
	{
		$prescricao = Prescricao::with('Atendimento')
			->with('Itens')
			->with('Medico')
			->where(['codigo' => $id, 'cod_atendimento' => $idAtendimento])
			->first();

		echo '<pre>';
		print_r($prescricao);
		exit;
	}

	/* *
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function edit($idAtendimento)
	// {
	// 	//
	// }

	/* *
	 * Atualiza uma prescrição em específico
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function update($idAtendimento, $id)
	// {
	// 	//
	// }

	/* *
	 * Remove uma prescrição
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function destroy($idAtendimento)
	// {
	// 	//
	// }

}
