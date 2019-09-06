<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquet extends Model
{
	public function responsable()
	{
		return $this->belongsTo('App\Models\Enseignant', 'responsable_id');
	}

	public function correcteur1()
	{
		return $this->belongsTo('App\Models\Enseignant', 'correcteur1_id');
	}

	public function correcteur2()
	{
		return $this->belongsTo('App\Models\Enseignant', 'correcteur2_id');
	}

	public function correcteur3()
	{
		return $this->belongsTo('App\Models\Enseignant', 'correcteur3_id');
	}

	public function encryptor()
	{
		return $this->belongsTo('App\Models\Encryptor');
	}

	public function etudiants()
	{
		return $this->belongsToMany('App\Models\Etudiant', 'notes');
	}
}
