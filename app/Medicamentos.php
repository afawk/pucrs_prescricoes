<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model {
    protected $table = 'cadastro_medicamentos';
    protected $primaryKey = 'codigo';
    protected $fillable = ['nome'];
    public $timestamps = false;

    public function apresentacao()
    {
        return $this->belongsToMany(
            'App\Apresentacao',
            'medicamento_apresentacao',
            'cod_medicamento',
            'cod_apresentacao'
        );
    }

    public function frequencias()
    {
        return $this->belongsToMany(
            'App\FrequenciaUtilizacao',
            'medicamento_frequencia',
            'cod_medicamento',
            'cod_frequencia'
        );
    }

    public function vias()
    {
        return $this->belongsToMany(
            'App\ViaUtilizacao',
            'medicamento_via',
            'cod_medicamento',
            'cod_via'
        );
    }
}
