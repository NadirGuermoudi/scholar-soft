<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
	protected $fillable = ['specialite', 'numero', 'annee'];


	public function seances()
	{
		return $this->belongsToMany('App\Models\Seance', 'groupe_seance');
	}

	public function etudiants()
	{
		return $this->belongsToMany('App\Models\Etudiant', 'groupe_etudiant');
	}

	public function getFullNameAttribute() {
		return $this->specialite . ' ' . $this->annee . ' G' . $this->numero;
	}
}
