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
		//DIMANCHE
		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Reseau";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Analyse de données";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "11:30";
		$seance->heur_fin = "13:00";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Reseau";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->once_two_week = true;
		$seance->save();

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Analyse de données";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->once_two_week = true;
		$seance->save();

		//LUNDI
		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Base de données avancées";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "08:30";
		$seance->heur_fin = "10:00";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Middlewares et systèmes distribués";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "TD";
		$seance->module = "Middlewares et systèmes distribués";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "11:30";
		$seance->heur_fin = "13:00";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Middlewares et systèmes distribués";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->once_two_week = true;
		$seance->save();

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Base de données avancées";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->once_two_week = true;
		$seance->save();

		//MARDI
		$seance = new Seance();
		$seance->type = "TD";
		$seance->module = "Base de données avancées";
		$seance->jour = "MARDI";
		$seance->heur_debut = "08:30";
		$seance->heur_fin = "10:00";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Management du projet informatique";
		$seance->jour = "MARDI";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Management du projet informatique";
		$seance->jour = "MARDI";
		$seance->heur_debut = "11:30";
		$seance->heur_fin = "13:00";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		//MERCREDI
		$seance = new Seance();
		$seance->type = "TD";
		$seance->module = "Algorithmique avancée";
		$seance->jour = "MERCREDI";
		$seance->heur_debut = "08:30";
		$seance->heur_fin = "10:00";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Algorithmique avancée";
		$seance->jour = "MERCREDI";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Anglais";
		$seance->jour = "MERCREDI";
		$seance->heur_debut = "11:30";
		$seance->heur_fin = "13:00";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Systèmes Informatiques embarqués";
		$seance->jour = "MERCREDI";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = 56;
		$seance->enseignant_id = 1;
		$seance->save();
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