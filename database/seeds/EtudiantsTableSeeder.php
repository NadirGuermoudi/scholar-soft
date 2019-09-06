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
			'date_naissance' => '1996-06-09',
			'email' => 'nadir.guermoudi@gmail.com',
			'password' => bcrypt('password'),
			'remember_token' => Str::random(10),
		]);

		factory('App\Models\Etudiant', 600)->create();
	}

	// $table->bigIncrements('id');
	// $table->string('matricule');
	// $table->string('nom');
	// $table->string('prenom');
	// $table->date('date_naissance')->nullable();
	// $table->string('email')->unique();
	// $table->string('password');
	// $table->rememberToken();
	// $table->timestamps();
}
