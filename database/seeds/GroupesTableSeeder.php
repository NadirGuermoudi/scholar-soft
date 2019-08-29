<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Groupe;

class GroupesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$groupe = new Groupe();
		$groupe->specialite = 'L1 MI';
		$groupe->numero = 1;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(2, 30));

		$groupe = new Groupe();
		$groupe->specialite = 'L1 MI';
		$groupe->numero = 2;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(31, 60));

		$groupe = new Groupe();
		$groupe->specialite = 'L1 MI';
		$groupe->numero = 3;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(61, 90));

		$groupe = new Groupe();
		$groupe->specialite = 'L1 MI';
		$groupe->numero = 4;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(91, 120));

		$groupe = new Groupe();
		$groupe->specialite = 'L1 MI';
		$groupe->numero = 5;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(121, 150));

		$groupe = new Groupe();
		$groupe->specialite = 'L1 MI';
		$groupe->numero = 6;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(151, 180));

		$groupe = new Groupe();
		$groupe->specialite = 'L1 MI';
		$groupe->numero = 7;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(181, 210));

		$groupe = new Groupe();
		$groupe->specialite = 'L1 MI';
		$groupe->numero = 8;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(211, 240));

		$groupe = new Groupe();
		$groupe->specialite = 'L2 INFO';
		$groupe->numero = 1;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(241, 270));

		$groupe = new Groupe();
		$groupe->specialite = 'L2 INFO';
		$groupe->numero = 2;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(271, 300));

		$groupe = new Groupe();
		$groupe->specialite = 'L2 INFO';
		$groupe->numero = 3;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(301, 330));

		$groupe = new Groupe();
		$groupe->specialite = 'L2 INFO';
		$groupe->numero = 4;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(331, 360));

		$groupe = new Groupe();
		$groupe->specialite = 'L3 INFO';
		$groupe->numero = 1;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(361, 390));

		$groupe = new Groupe();
		$groupe->specialite = 'L3 INFO';
		$groupe->numero = 2;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(391, 420));

		$groupe = new Groupe();
		$groupe->specialite = 'L3 INFO';
		$groupe->numero = 3;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(421, 450));

		$groupe = new Groupe();
		$groupe->specialite = 'L3 INFO';
		$groupe->numero = 4;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(451, 480));

		$groupe = new Groupe();
		$groupe->specialite = 'M1 RSD';
		$groupe->numero = 1;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(481, 510));

		$groupe = new Groupe();
		$groupe->specialite = 'M1 MID';
		$groupe->numero = 1;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(511, 540));

		$groupe = new Groupe();
		$groupe->specialite = 'M1 SIC';
		$groupe->numero = 1;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(range(541, 570));

		$groupe = new Groupe();
		$groupe->specialite = 'M1 GL';
		$groupe->numero = 1;
		$groupe->annee = '2018/2019';
		$groupe->save();
		$groupe->etudiants()->attach(1);
		$groupe->etudiants()->attach(range(571, 600));
	}
}
