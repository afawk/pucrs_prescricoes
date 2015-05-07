<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Unidade;
use App\Paciente;
use App\Atendimento;

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

		DB::table('paciente')->delete();
		Paciente::create(['registro' => 1, 'nome' => 'ADALBERTO DA SILVA DOMINGOS']);
		Paciente::create(['registro' => 2, 'nome' => 'MARCELO SANTOS SILVEIRA']);
		Paciente::create(['registro' => 3, 'nome' => 'ROBERTO SANTOS']);
		Paciente::create(['registro' => 4, 'nome' => 'MAICON GONCALVES']);
		Paciente::create(['registro' => 5, 'nome' => 'VANIA PASCOAL SILVEIRA']);
		Paciente::create(['registro' => 6, 'nome' => 'VERA LUCIA MACIEL']);

		DB::table('atendimento')->delete();
		Atendimento::create(['codigo' => 1, 'cod_unidade' => 1, 'cod_paciente' => 1]);
		Atendimento::create(['codigo' => 2, 'cod_unidade' => 2, 'cod_paciente' => 2]);
		Atendimento::create(['codigo' => 3, 'cod_unidade' => 2, 'cod_paciente' => 3]);
		Atendimento::create(['codigo' => 4, 'cod_unidade' => 3, 'cod_paciente' => 4]);
		Atendimento::create(['codigo' => 5, 'cod_unidade' => 3, 'cod_paciente' => 5]);
		Atendimento::create(['codigo' => 6, 'cod_unidade' => 3, 'cod_paciente' => 6]);
	}
}
