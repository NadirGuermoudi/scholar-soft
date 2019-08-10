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

}
