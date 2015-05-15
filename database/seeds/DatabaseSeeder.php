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

		$this->seedUnidades();
		$this->seedPacientes();
		$this->seedAtendimentos();
	}

	private function seedUnidades()
	{
		DB::table('unidade')->delete();
		Unidade::create(['codigo' => 1, 'nome' => 'PEDIATRIA']);
		Unidade::create(['codigo' => 2, 'nome' => 'RECUPERAÇÃO']);
		Unidade::create(['codigo' => 3, 'nome' => 'PSIQUIATRIA']);
	}

	private function seedPacientes()
	{
		DB::table('paciente')->delete();
		Paciente::create([
			'registro'        => 1,
			'nome'            => 'ADALBERTO DA SILVA DOMINGOS',
			'sexo'            => 'M',
			'data_nascimento' => '2003-02-01',
			'cpf'             => 83079629001
		]);
		Paciente::create([
			'registro'        => 2,
			'nome'            => 'MARCELO SANTOS SILVEIRA',
			'sexo'            => 'M',
			'data_nascimento' => '2000-05-03',
			'cpf'             => 83079629002
		]);
		Paciente::create([
			'registro'        => 3,
			'nome'            => 'ROBERTO SANTOS',
			'sexo'            => 'M',
			'data_nascimento' => '1998-01-07',
			'cpf'             => 83079629003
		]);
		Paciente::create([
			'registro'        => 4,
			'nome'            => 'MAICON GONCALVES',
			'sexo'            => 'M',
			'data_nascimento' => '2001-02-06',
			'cpf'             => 83079629004
		]);
		Paciente::create([
			'registro'        => 5,
			'nome'            => 'VANIA PASCOAL SILVEIRA',
			'sexo'            => 'F',
			'data_nascimento' => '2003-09-09',
			'cpf'             => 83079629005
		]);
		Paciente::create([
			'registro'        => 6,
			'nome'            => 'VERA LUCIA MACIEL',
			'sexo'            => 'F',
			'data_nascimento' => '1985-05-08',
			'cpf'             => 83079629006
		]);
	}

	private function seedAtendimentos() {
		DB::table('atendimento')->delete();
		Atendimento::create(['codigo' => 1, 'cod_unidade' => 1, 'cod_paciente' => 1]);
		Atendimento::create(['codigo' => 2, 'cod_unidade' => 2, 'cod_paciente' => 2]);
		Atendimento::create(['codigo' => 3, 'cod_unidade' => 2, 'cod_paciente' => 3]);
		Atendimento::create(['codigo' => 4, 'cod_unidade' => 3, 'cod_paciente' => 4]);
		Atendimento::create(['codigo' => 5, 'cod_unidade' => 3, 'cod_paciente' => 5]);
		Atendimento::create(['codigo' => 6, 'cod_unidade' => 3, 'cod_paciente' => 6]);
	}
}
