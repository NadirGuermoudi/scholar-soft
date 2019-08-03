<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EtudiantsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('etudiants')->insert([
			'matricule' => Str::random(10),
			'nom' => 'GUERMOUDI',
			'prenom' => 'Nadir',
			'email' => 'nadir.guermoudi@gmail.com',
			'password' => bcrypt('password'),
			'remember_token' => Str::random(10),
		]);

		factory('App\Models\Etudiant', 200)->create();
	}

	// $table->bigIncrements('id');
	// $table->string('matricule');
	// $table->string('nom');
	// $table->string('prenom');
	// $table->date('date-naissance')->nullable();
	// $table->string('email')->unique();
	// $table->string('password');
	// $table->rememberToken();
	// $table->timestamps();
}
