<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescricaoItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prescricao_item', function(Blueprint $table)
		{
			$table->increments('codigo');
			$table->integer('cod_prescricao');
			$table->integer('cod_item');
			$table->string('tipo_item', 1);
			$table->integer('quantidade');
			$table->integer('cod_via');
			$table->integer('cod_frequencia');
			$table->integer('cod_apresentacao');
			$table->integer('se_necessario');
			$table->string('observacao', 200);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prescricao_item');
	}

}
