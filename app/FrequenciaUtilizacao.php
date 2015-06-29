<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FrequenciaUtilizacao extends Model {
    protected $table = 'cadastro_frequencia';
    protected $primaryKey = 'codigo';
    protected $fillable = ['descricao'];
    public $timestamps = false;

    public function medicamentos()
    {
        return $this->belongsToMany(
            'App\Medicamentos',
            'medicamento_frequencia',
            'cod_frequencia',
            'cod_medicamento'
        );
    }

}
