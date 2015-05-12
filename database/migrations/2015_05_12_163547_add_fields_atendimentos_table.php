<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsAtendimentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('atendimento', function(Blueprint $table)
		{
			$table->integer('medico_responsavel');
			$table->date('data_inicio');
			$table->date('data_fim');
			$table->integer('cod_leito');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('atendimento', function(Blueprint $table) {
			$table->dropColumn('medico_responsavel');
			$table->dropColumn('data_inicio');
			$table->dropColumn('data_fim');
			$table->dropColumn('cod_leito');
		});
	}

}
