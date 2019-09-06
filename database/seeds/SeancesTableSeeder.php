<?php

use Illuminate\Database\Seeder;
use App\Models\Seance;
use App\Models\Salle;
use App\Models\Groupe;

class SeancesTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$salle = Salle::where('nom', 'N107')->first()->id;
		$groupeGL = Groupe::where('specialite', 'M1 GL')->first()->id;
		$groupeSIC = Groupe::where('specialite', 'M1 SIC')->first()->id;
		$groupeMID = Groupe::where('specialite', 'M1 MID')->first()->id;
		$groupeRSD = Groupe::where('specialite', 'M1 RSD')->first()->id;
		//DIMANCHE
		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Reseau";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 4;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Analyse de données";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "11:30";
		$seance->heur_fin = "13:00";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 5;
		$seance->save();
		$seance->groupes()->attach([$groupeGL, $groupeSIC]);

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Reseau";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 4;
		$seance->once_two_week = true;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Analyse de données";
		$seance->jour = "DIMANCHE";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 6;
		$seance->once_two_week = true;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		//LUNDI
		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Base de données avancées";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "08:30";
		$seance->heur_fin = "10:00";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 7;
		$seance->save();
		$seance->groupes()->attach([$groupeGL, $groupeRSD]);

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Middlewares et systèmes distribués";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 3;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "TD";
		$seance->module = "Middlewares et systèmes distribués";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "11:30";
		$seance->heur_fin = "13:00";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 3;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Middlewares et systèmes distribués";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 3;
		$seance->once_two_week = true;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Base de données avancées";
		$seance->jour = "LUNDI";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 7;
		$seance->once_two_week = true;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		//MARDI
		$seance = new Seance();
		$seance->type = "TD";
		$seance->module = "Base de données avancées";
		$seance->jour = "MARDI";
		$seance->heur_debut = "08:30";
		$seance->heur_fin = "10:00";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 7;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Management du projet informatique";
		$seance->jour = "MARDI";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 1;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Management du projet informatique";
		$seance->jour = "MARDI";
		$seance->heur_debut = "11:30";
		$seance->heur_fin = "13:00";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 1;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		//MERCREDI
		$seance = new Seance();
		$seance->type = "TD";
		$seance->module = "Algorithmique avancée";
		$seance->jour = "MERCREDI";
		$seance->heur_debut = "08:30";
		$seance->heur_fin = "10:00";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 8;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Algorithmique avancée";
		$seance->jour = "MERCREDI";
		$seance->heur_debut = "10:00";
		$seance->heur_fin = "11:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 8;
		$seance->save();
		$seance->groupes()->attach([$groupeGL, $groupeMID]);

		$seance = new Seance();
		$seance->type = "Cours";
		$seance->module = "Anglais";
		$seance->jour = "MERCREDI";
		$seance->heur_debut = "11:30";
		$seance->heur_fin = "13:00";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 9;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);

		$seance = new Seance();
		$seance->type = "TP";
		$seance->module = "Systèmes Informatiques embarqués";
		$seance->jour = "MERCREDI";
		$seance->heur_debut = "13:30";
		$seance->heur_fin = "16:30";
		$seance->salle_id = $salle;
		$seance->enseignant_id = 2;
		$seance->save();
		$seance->groupes()->attach([$groupeGL]);
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
