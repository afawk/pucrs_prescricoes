<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model {
	protected $table = 'atendimento';
    protected $primaryKey = 'codigo';
	protected $fillable = ['descricao_alta'];

	public $timestamps = false;

	public function paciente() {
		return $this->belongsTo('App\Paciente', 'cod_paciente', 'registro');
	}

    public function unidade() {
        return $this->belongsTo('App\Unidade', 'cod_unidade', 'codigo');
    }

	public function medico() {
		return $this->belongsTo('App\Medico', 'medico_responsavel', 'crm');
	}
}
