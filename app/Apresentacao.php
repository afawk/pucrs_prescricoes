<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Apresentacao extends Model {
    protected $table = 'cadastro_apresentacao';
    protected $primaryKey = 'codigo';
    protected $fillable = ['descricao', 'abreviacao'];
    public $timestamps = false;

    public function medicamento()
    {
        return $this->belongsToMany(
            'App\Medicamentos',
            'medicamento_apresentacao',
            'cod_apresentacao',
            'cod_medicamento'
        );
    }
}
