<?php

class AuthenticationTest extends TestCase {
	public function testRequiresLoginToAccessHome()
	{
		$response = $this->call('GET', '/');
		$this->assertRedirectedTo('/auth/login');
	}

	public function testAllowAccessToHomeIfLoggedIn()
	{
		$medico = new App\Medico(['nome' => 'John']);
		$this->be($medico);

		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());
	}
}
