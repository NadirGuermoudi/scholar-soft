<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groupes')->insert([
			'specialite' => 'L2 INFO',
			'numero' => 1,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'L2 INFO',
			'numero' => 2,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'L2 INFO',
			'numero' => 3,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'L2 INFO',
			'numero' => 4,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'L3 INFO',
			'numero' => 1,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'L3 INFO',
			'numero' => 2,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'L3 INFO',
			'numero' => 3,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'L3 INFO',
			'numero' => 4,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'M1 RSD',
			'numero' => 1,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'M1 MID',
			'numero' => 1,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'M1 SIC',
			'numero' => 1,
			'annee' => '2018/2019',
		]);

		DB::table('groupes')->insert([
			'specialite' => 'M1 GL',
			'numero' => 1,
			'annee' => '2018/2019',
		]);
	}
}
