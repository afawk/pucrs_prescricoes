<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastroApresentacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cadastro_apresentacao', function(Blueprint $table)
		{
			$table->increments('codigo');
			$table->string('descricao', 150);
			$table->string('abreviacao', 5);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cadastro_apresentacao');
	}

}
