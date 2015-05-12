<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescricaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prescricao', function(Blueprint $table)
		{
			$table->increments('codigo');
			$table->dateTime('data_hora_liberacao');
			$table->bigInteger('crm_medico');
			$table->bigInteger('cod_atendimento');
			$table->string('status', 1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prescricao');
	}

}
