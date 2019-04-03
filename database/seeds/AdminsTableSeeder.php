<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('admins')->insert([
			// 'matricule' => Str::random(10),
			'nom' => 'admin',
			'prenom' => 'admin',
			'email' => 'admin@scholar-soft.com',
			'password' => bcrypt('password'),
		]);
	}
}
