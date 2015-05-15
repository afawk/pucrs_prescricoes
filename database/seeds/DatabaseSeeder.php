<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Atendimento;
use App\Medico;
use App\Paciente;
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
		Unidade::create(['codigo' => 1, 'nome' => 'Pediatria']);
		Unidade::create(['codigo' => 2, 'nome' => 'Recuperação']);
		Unidade::create(['codigo' => 3, 'nome' => 'Psiquiatria']);

		DB::table('paciente')->delete();
		Paciente::create(['registro' => 1, 'nome' => 'Adalberto da Silva Domingos']);
		Paciente::create(['registro' => 2, 'nome' => 'Marcelo Santos Silveira']);
		Paciente::create(['registro' => 3, 'nome' => 'Roberto Santos']);
		Paciente::create(['registro' => 4, 'nome' => 'Maicon Goncalves']);
		Paciente::create(['registro' => 5, 'nome' => 'Vania Pascoal Silveira']);
		Paciente::create(['registro' => 6, 'nome' => 'Vera Lucia Maciel']);

		DB::table('atendimento')->delete();
		Atendimento::create(['codigo' => 1, 'cod_unidade' => 1, 'cod_paciente' => 1]);
		Atendimento::create(['codigo' => 2, 'cod_unidade' => 2, 'cod_paciente' => 2]);
		Atendimento::create(['codigo' => 3, 'cod_unidade' => 2, 'cod_paciente' => 3]);
		Atendimento::create(['codigo' => 4, 'cod_unidade' => 3, 'cod_paciente' => 4]);
		Atendimento::create(['codigo' => 5, 'cod_unidade' => 3, 'cod_paciente' => 5]);
		Atendimento::create(['codigo' => 6, 'cod_unidade' => 3, 'cod_paciente' => 6]);

		DB::table('medico')->delete();
		//Medico::create(['']);
	}
}
