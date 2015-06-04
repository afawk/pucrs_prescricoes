<?php

class UnidadesControllerTest extends TestCase {
	public function testIndexRendersAllUnidades()
	{
		Eloquent::unguard();
		DB::table('unidade')->delete();
		App\Unidade::create(['nome' => 'PEDIATRIA']);
		App\Unidade::create(['nome' => 'UTI']);

		$medico = new App\Medico(['nome' => 'John']);
		$this->be($medico);

		$response = $this->action('GET', 'UnidadesController@index');

		$view = $response->original;
		$this->assertCount(2, $view['unidades']);
		$this->assertContainsOnlyInstancesOf('App\Unidade', $view['unidades']);
	}
}
