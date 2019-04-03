<?php

use Illuminate\Database\Seeder;

class EncryptorsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('encryptors')->insert([
			// 'matricule' => Str::random(10),
			'nom' => 'encryptor',
			'prenom' => 'encryptor',
			'email' => 'encryptor@scholar-soft.com',
			'password' => bcrypt('password'),
		]);
	}
}
