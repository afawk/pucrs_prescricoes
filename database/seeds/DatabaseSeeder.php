<?php

use App\Session;
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

		$this->seedUnidades();
		$this->seedPacientes();
		$this->seedAtendimentos();
		$this->seedMedicos();
        $this->seedSessions();
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

	private function seedMedicos() {
		DB::table('medico')->delete();

		Medico::create([
			'crm'     => '1234567',
			'nome'    => 'Médico 1',
			'usuario' => 'medico1@hospital.org',
			'senha'   => Hash::make('password'),
		]);
	}

    private function seedSessions(){
        DB::table('sessions')->delete();

        Session::create([
            'id' => Hash::make('1000'),
            'payload' => 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRExEM3JVcHFGeXpVQ0E4Y1YxOW5pSk9ETURaRHBaNGs4bTVSZ3didCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozODoibG9naW5fODJlNWQyYzU2YmRkMDgxMTMxOGYwY2YwNzhiNzhiZmMiO2k6MTIzNDU2NztzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQzNTU4MzAzMztzOjE6ImMiO2k6MTQzNTU4MTMzMztzOjE6ImwiO3M6MToiMCI7fX0=',
            'last_activity' => 1435583000,
            'created_at' => '2015-05-01 00:03:00'
        ]);
        Session::create([
            'id' => Hash::make('1001'),
            'payload' => 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRExEM3JVcHFGeXpVQ0E4Y1YxOW5pSk9ETURaRHBaNGs4bTVSZ3didCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozODoibG9naW5fODJlNWQyYzU2YmRkMDgxMTMxOGYwY2YwNzhiNzhiZmMiO2k6MTIzNDU2NztzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQzNTU4MzAzMztzOjE6ImMiO2k6MTQzNTU4MTMzMztzOjE6ImwiO3M6MToiMCI7fX0=',
            'last_activity' => 1435583033,
            'created_at' => '2015-06-29 13:03:50'
        ]);
        Session::create([
            'id' => Hash::make('1002'),
            'payload' => 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRExEM3JVcHFGeXpVQ0E4Y1YxOW5pSk9ETURaRHBaNGs4bTVSZ3didCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozODoibG9naW5fODJlNWQyYzU2YmRkMDgxMTMxOGYwY2YwNzhiNzhiZmMiO2k6MTIzNDU2NztzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQzNTU4MzAzMztzOjE6ImMiO2k6MTQzNTU4MTMzMztzOjE6ImwiO3M6MToiMCI7fX0=',
            'last_activity' => 1435583043,
            'created_at' => '2015-06-29 13:04:50'
        ]);
        Session::create([
            'id' => Hash::make('1003'),
            'payload' => 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRExEM3JVcHFGeXpVQ0E4Y1YxOW5pSk9ETURaRHBaNGs4bTVSZ3didCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozODoibG9naW5fODJlNWQyYzU2YmRkMDgxMTMxOGYwY2YwNzhiNzhiZmMiO2k6MTIzNDU2NztzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQzNTU4MzAzMztzOjE6ImMiO2k6MTQzNTU4MTMzMztzOjE6ImwiO3M6MToiMCI7fX0=',
            'last_activity' => 1435583043,
            'created_at' => '2015-06-29 13:04:50'
        ]);
    }
}
