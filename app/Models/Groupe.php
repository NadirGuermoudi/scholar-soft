<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
	public function seances()
	{
		return $this->belongsToMany('App\Models\Seance');
	}

	public function etudiants()
	{
		return $this->belongsToMany('App\Models\Etudiant');
	}	
}
