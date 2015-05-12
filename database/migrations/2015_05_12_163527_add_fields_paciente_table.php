<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsPacienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paciente', function(Blueprint $table) {
			$table->string('sexo', 1)->nullable();
			$table->date('data_nascimento')->nullable();
			$table->bigInteger('cpf')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paciente', function(Blueprint $table) {
			$table->dropColumn('sexo', 1);
			$table->dropColumn('data_nascimento');
			$table->dropColumn('cpf');
		});
	}

}
