<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model {
	protected $table = 'atendimento';
	protected $primaryKey = 'codigo';
	public $timestamps = false;
}
