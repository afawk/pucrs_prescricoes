<?php

class AtendimentosControllerTest extends TestCase {
	public function setUp()
	{
		parent::setUp();
		Artisan::call('migrate');

		$medico = new App\Medico(['nome' => 'John']);
		$this->be($medico);

		Eloquent::unguard();
		DB::table('atendimento')->delete();
		DB::table('unidade')->delete();
		DB::table('paciente')->delete();
	}

	public function testShowRendersTheSelectedAtendimento()
	{
		$unidade = App\Unidade::create(['nome' => 'PEDIATRIA']);
		$paciente = App\Paciente::create(['nome' => 'Joao']);
		$atendimento = App\Atendimento::create([
			'cod_unidade' => $unidade->codigo,
			'cod_paciente' => $paciente->registro,
			'data_inicio'  => date('Y-m-d H:i:s')
		]);

		$response = $this->action('GET', 'AtendimentosController@show', ['codigo' => $atendimento->codigo]);

		$view = $response->original;
		$this->assertInstanceOf('App\Atendimento', $view['atendimento']);
		$this->assertEquals($atendimento->codigo, $view['atendimento']->codigo);
	}
}
