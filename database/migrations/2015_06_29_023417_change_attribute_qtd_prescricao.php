<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAttributeQtdPrescricao extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prescricao_item', function(Blueprint $table)
		{
			$table->renameColumn('quantidade', 'posologia');
		});

		Schema::table('prescricao_item', function(Blueprint $table)
		{
			$table->string('posologia', 25)->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prescricao_item', function(Blueprint $table)
		{
			$table->renameColumn('posologia', 'quantidade');
		});

		Schema::table('prescricao_item', function(Blueprint $table)
		{
			$table->integer('quantidade', 25)->change();
		});
	}

}
