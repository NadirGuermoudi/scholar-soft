<?php

use Illuminate\Database\Seeder;
use App\Models\Seance;

class SeancesTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Reseau";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
	}

	// $table->bigIncrements('id');
	// $table->enum('type', ['Cours', 'TD', 'TP']);
	// $table->string('module');
	// $table->enum('jour', ['DIMANCHE', 'LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI', 'SAMEDI']);
	// $table->time('heur_debut');
	// $table->time('heur_fin');

	// $table->unsignedBigInteger('salle_id')->nullable();
	// $table->unsignedBigInteger('enseignant_id')->nullable();
}
