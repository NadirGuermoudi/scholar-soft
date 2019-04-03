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
}