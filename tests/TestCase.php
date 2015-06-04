<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		putenv('DB_DEFAULT=postgres://postgres:postgres@localhost:5432/prescricoes_medicas-unit');
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}


	public function setUp()
	{
		parent::setUp();
		Artisan::call('migrate');
	}

	public function tearDown()
	{
		Artisan::call('migrate:reset');
		parent::tearDown();
	}
}
