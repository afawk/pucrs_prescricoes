<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ViaUtilizacao extends Model {
    protected $table = 'cadastro_via';
    protected $primaryKey = 'codigo';
    protected $fillable = ['descricao', 'abreviacao'];
    public $timestamps = false;

    public function medicamentos()
    {
        return $this->belongsToMany(
            'App\Medicamentos',
            'medicamento_via',
            'cod_via',
            'cod_medicamento'
        );
    }
}
