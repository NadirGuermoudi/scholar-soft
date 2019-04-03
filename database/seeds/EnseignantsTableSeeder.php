<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EnseignantsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('enseignants')->insert([
			'matricule' => Str::random(10),
			'nom' => 'MESSABIHI',
			'prenom' => 'Mohamed',
			'grade' => 'MCB',
			'admin' => true,
			'email' => 'messabihi.mohamed@gmail.com',
			'password' => bcrypt('password'),
		]);
	}

	// $table->bigIncrements('id');
	// $table->string('matricule');
	// $table->string('nom');
	// $table->string('prenom');
	// $table->date('date-naissance')->nullable();
	// $table->string('grade');
	// $table->boolean('admin')->default(false);
	// $table->string('email')->unique();
	// $table->string('password');
	// $table->rememberToken();
	// $table->timestamps();
}
