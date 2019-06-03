<?php

use Illuminate\Database\Seeder;
use App\Models\Salle;

class SallesTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		for ($i=0; $i < 6; $i++) { 
			$salle = new Salle();
			$salle->nom = "Amphi " . ($i+1);
			$salle->capacite = 200;
			$salle->save();
		}

		for ($i=1; $i < 10 ; $i++) { 
			$salle = new Salle();
			$salle->nom = "N00" . ($i);
			$salle->capacite = 40;
			$salle->save();

			$salle = new Salle();
			$salle->nom = "N" . ($i+100);
			$salle->capacite = 40;
			$salle->save();

			$salle = new Salle();
			$salle->nom = "N" . ($i+200);
			$salle->capacite = 40;
			$salle->save();

			$salle = new Salle();
			$salle->nom = "N" . ($i+300);
			$salle->capacite = 40;
			$salle->save();

			$salle = new Salle();
			$salle->nom = "S00" . ($i);
			$salle->capacite = 40;
			$salle->save();

			$salle = new Salle();
			$salle->nom = "S" . ($i+100);
			$salle->capacite = 40;
			$salle->save();

			$salle = new Salle();
			$salle->nom = "S" . ($i+200);
			$salle->capacite = 40;
			$salle->save();

			$salle = new Salle();
			$salle->nom = "S" . ($i+300);
			$salle->capacite = 40;
			$salle->save();
		}
	}

	// $table->bigIncrements('id');
	// $table->string('nom');
	// $table->integer('capacite');
	// $table->timestamps();
}
