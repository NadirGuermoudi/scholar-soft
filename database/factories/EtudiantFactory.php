<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Etudiant::class, function (Faker $faker) {
	return [
		'matricule' => $faker->numerify('##########'),		
		'nom' => $faker->firstName,
		'prenom' => $faker->lastName,
		'date_naissance' => $faker->date,
		'email' => $faker->email,
		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
		'remember_token' => Str::random(10),
	];
});

// $table->bigIncrements('id');
// $table->string('matricule');
// $table->string('nom');
// $table->string('prenom');
// $table->date('date-naissance')->nullable();
// $table->string('email')->unique();
// $table->string('password');
// $table->rememberToken();
// $table->timestamps();
