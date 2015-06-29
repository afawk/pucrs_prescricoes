<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescricaoItem extends Model {
    protected $table = 'prescricao_item';
    protected $primaryKey = 'codigo';
    protected $fillable = ['tipo_item', 'observacao', 'posologia'];
    public $timestamps = false;

    public function prescricao() {
        return $this->belongsTo('App\Prescricao', 'cod_prescricao', 'codigo');
    }

    public function atendimento() {
        return $this->belongsTo('App\Atendimento', 'cod_atendimento', 'codigo');
    }

    public function via() {
        return $this->belongsTo('App\ViaUtilizacao', 'cod_via', 'codigo');
    }

    public function frequencia() {
        return $this->belongsTo('App\FrequenciaUtilizacao', 'cod_frequencia', 'codigo');
    }

    public function apresentacao() {
        return $this->belongsTo('App\Apresentacao', 'cod_apresentacao', 'codigo');
    }

    public function item() {
        if ($this->attributes['tipo_item'] == 'm') {
            return $this->belongsTo('App\Medicamentos', 'cod_item', 'codigo');
        }
        else if ($this->attributes['tipo_item'] == 'a') {

        }
    }
}
