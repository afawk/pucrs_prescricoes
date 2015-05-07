<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Unidade;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::table('unidade')->delete();
		Unidade::create(['codigo' => 1, 'nome' => 'PEDIATRIA']);
		Unidade::create(['codigo' => 2, 'nome' => 'RECUPERAÇÃO']);
		Unidade::create(['codigo' => 3, 'nome' => 'PSIQUIATRIA']);
	}

}
