<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Medico extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'medico';

	protected $fillable = ['usuario', 'senha'];
	protected $hidden = ['senha', 'remember_token'];

	protected $primaryKey = 'crm';
	public $timestamps = false;

	public function getAuthPassword() {
		return $this->senha;
	}
}
