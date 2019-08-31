<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Enseignant extends Authenticatable
{
	use Notifiable;

	protected $table = 'enseignants';

	protected $fillable = ['matricule', 'nom', 'prenom', 'email',  'password'];

	protected $hidden = ['password',  'remember_token'];

	public function getFullNameAttribute(){
		return strtoupper($this->nom) . ' ' . ucfirst($this->prenom);
	}

	public function seances(){
		return $this->hasMany('App\Models\Seance');
	}

	public function mesPaquets(){
		return $this->hasMany('App\models\Paquet', 'responsable');
	}

	public function mesPaquetsCorrecteur1(){
		return $this->hasMany('App\models\Paquet', 'correcteur1');
	}

	public function mesPaquetsCorrecteur2(){
		return $this->hasMany('App\models\Paquet', 'correcteur2');
	}

	public function mesPaquetsCorrecteur3(){
		return $this->hasMany('App\models\Paquet', 'correcteur3');
	}
}
