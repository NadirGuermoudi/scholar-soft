<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Encryptor extends Model
{
	use Notifiable;

	protected $table = 'encryptors';

	protected $fillable = ['nom', 'prenom', 'email',  'password'];

	protected $hidden = ['password',  'remember_token'];
}