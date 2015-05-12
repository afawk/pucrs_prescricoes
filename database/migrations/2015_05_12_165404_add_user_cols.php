<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserCols extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medico', function (Blueprint $table) {
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
        Schema::table('medico', function (Blueprint $table) {
            $table->dropColumn('usuario');
            $table->dropColumn('senha');
        });
    }

}
