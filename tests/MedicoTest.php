<?php

class MedicoTest extends TestCase {
	public function testMapsAuthPasswordToSenha()
	{
		$medico = new App\Medico(['senha' => 'a-password']);
		$this->assertEquals("a-password", $medico->getAuthPassword());
	}

	public function testAllowAccessToHomeIfLoggedIn()
	{
		$medico = new App\Medico(['nome' => 'John']);
		$this->be($medico);

		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());
	}
}
