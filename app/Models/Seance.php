<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
	public function enseignant()
	{
		return $this->belongsTo('App\Models\Enseignant');
	}

	public function salle()
	{
		return $this->belongsTo('App\Models\Salle');
	}

	public function groupes()
	{
		return $this->belongsToMany('App\Models\Groupe');
		// return $this->belongsToMany('App\Models\Groupe', 'seance_groupe', 'user_id', 'role_id');
	}

	public function absents()
	{
		return $this->belongsToMany('App\Models\Etudiant', 'absences');
		// return $this->belongsToMany('App\Models\Groupe', 'seance_groupe', 'user_id', 'role_id');
	}

	public function absences()
	{
		return $this->hasMany(Absence::class);
	}
	
}
