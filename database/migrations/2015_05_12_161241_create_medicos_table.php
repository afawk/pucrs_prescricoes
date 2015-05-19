<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medico', function(Blueprint $table)
		{
			$table->bigInteger('crm');
			$table->string('nome', 150);
			$table->string('usuario', 50);
			$table->string('senha', 60);
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medico');
	}

}
