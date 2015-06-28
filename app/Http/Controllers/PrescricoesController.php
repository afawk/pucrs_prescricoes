<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Paciente;

class PrescricoesController extends Controller {

	/**
	 * Visualiza a prescrição atual do paciente
	 *
	 * @param  int  $idPaciente
	 * @return Response
	 */
	public function index($idPaciente)
	{
		$prescricao = Prescricao::with('Paciente')
			->with('Atendimento')
			->with('Unidade')
			->with('Medicamentos')
			->with('Medico')
			->where(['cod' => $idPaciente])
			->get();

		return view('prescricoes.index', ['prescricao' => $prescricao[0]]);
	}

	/**
	 * Mostra o formulário para criação de novas prescrições para o paciente
	 *
	 * @param  int  $idPaciente
	 * @return Response
	 */
	public function create($idPaciente)
	{
		$paciente = Paciente::where(['registro' => $idPaciente])->get();
		return view('prescricoes.create', ['paciente' => $paciente[0]]);
	}

	/**
	 * Salva uma nova prescrição
	 *
	 * @param  int  $idPaciente
	 * @return Response
	 */
	public function store(Request $request, $idPaciente)
	{
		print_r($request->all());
	}

	/**
	 * Mostra uma prescrição especifica
	 *
	 * @param  int  $idPaciente
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idPaciente, $id)
	{
		//
	}

	/* *
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function edit($idPaciente)
	// {
	// 	//
	// }

	/* *
	 * Atualiza uma prescrição em específico
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function update($idPaciente, $id)
	// {
	// 	//
	// }

	/* *
	 * Remove uma prescrição
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function destroy($idPaciente)
	// {
	// 	//
	// }

}
