<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Etudiant extends Authenticatable
{
	use Notifiable;

	protected $table = 'etudiants';

	protected $fillable = ['matricule', 'nom', 'prenom', 'email', 'password'];

	protected $hidden = ['password', 'remember_token'];

	public function getFullNameAttribute(){
		return strtoupper($this->nom) . ' ' . ucfirst($this->prenom);
	}

	public function groupes(){
		return $this->belongsToMany('App\Models\Groupe');
	}

	public function absences(){
		return $this->belongsToMany('App\Models\Seance', 'absences')->withPivot(['date', 'presence', 'justified', 'justification']);
	}

	public function paquets(){
		return $this->belongsToMany('App\Models\Paquet', 'notes')->withPivot(['code', 'note', 'note1', 'note2', 'note3']);
	}
}
