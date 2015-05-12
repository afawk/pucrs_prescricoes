<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsAtendimentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('atendimento', function(Blueprint $table)
		{
			$table->integer('medico_responsavel')->nullable();
			$table->date('data_inicio')->nullable();
			$table->date('data_fim')->nullable();
			$table->integer('cod_leito')->nullable();
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
