<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescricao extends Model {
    protected $table = 'prescricao';
    protected $primaryKey = 'codigo';
    protected $fillable = ['status'];
    public $timestamps = false;

    public function medico() {
        return $this->belongsTo('App\Medico', 'crm_medico', 'crm');
    }

    public function atendimento() {
        return $this->belongsTo('App\Atendimento', 'cod_atendimento', 'codigo');
    }

    public function itens() {
        return $this->hasMany('App\PrescricaoItem', 'cod_prescricao', 'codigo');
    }
}
