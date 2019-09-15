<?php

use Illuminate\Database\Seeder;
use App\Models\Paquet;
use App\Models\Groupe;
use Carbon\Carbon;

class PaquetsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$etudiants = Groupe::where('specialite', 'L1 MI')->where('numero', 1)->first()->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());
		$paquet = new Paquet();
		$paquet->module = 'Algo';
		$paquet->type = 'CC';
		$paquet->type_calcul = 'MAX';
		$paquet->difference = 3;
		$paquet->date_limite_encryptor = Carbon::now()->addDays(-60);
		$paquet->date_limite_correcteur1 = Carbon::now()->addDays(-55);
		$paquet->date_limite_correcteur2 = Carbon::now()->addDays(-35);
		$paquet->date_limite_correcteur3 = Carbon::now()->addDays(-30);
		$paquet->responsable_rendu = true;
		$paquet->encrypted = true;
		$paquet->correcteur1_rendu = true;
		$paquet->correcteur2_rendu = true;
		$paquet->correcteur3_rendu = true;
		$paquet->responsable_id = 1;
		$paquet->correcteur1_id = 2;
		$paquet->correcteur2_id = 3;
		$paquet->correcteur3_id = 4;
		$paquet->encryptor_id = 1;
		$paquet->save();
		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key], 'note' => $randomCodes[$key]%20, 'note1' => $randomCodes[$key]%20+2, 'note2' => $randomCodes[$key]%20]);
		}

		sleep(1);

		$etudiants = Groupe::where('specialite', 'L1 MI')->where('numero', 1)->first()->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());
		$paquet = new Paquet();
		$paquet->module = 'Algo';
		$paquet->type = 'EXAM';
		$paquet->type_calcul = 'MAX';
		$paquet->difference = 3;
		$paquet->date_limite_encryptor = Carbon::now()->addDays(-60);
		$paquet->date_limite_correcteur1 = Carbon::now()->addDays(-55);
		$paquet->date_limite_correcteur2 = Carbon::now()->addDays(-35);
		$paquet->date_limite_correcteur3 = Carbon::now()->addDays(-30);
		// $paquet->responsable_rendu = true;
		// $paquet->encrypted = true;
		// $paquet->correcteur1_rendu = true;
		// $paquet->correcteur2_rendu = true;
		// $paquet->correcteur3_rendu = true;
		$paquet->responsable_id = 1;
		$paquet->correcteur1_id = 2;
		$paquet->correcteur2_id = 3;
		$paquet->correcteur3_id = 4;
		// $paquet->encryptor_id = 1;
		$paquet->save();
		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key]]);
		}

		sleep(1);

		$etudiants = Groupe::where('specialite', 'M1 GL')->first()->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());
		$paquet = new Paquet();
		$paquet->module = 'Management du projet informatique';
		$paquet->type = 'CC';
		$paquet->type_calcul = 'MAX';
		$paquet->difference = 3;
		$paquet->date_limite_encryptor = Carbon::now()->addDays(5);
		$paquet->date_limite_correcteur1 = Carbon::now()->addDays(15);
		// $paquet->date_limite_correcteur2 = '2019-03-12';
		// $paquet->date_limite_correcteur3 = '2019-03-18';
		$paquet->responsable_rendu = true;
		$paquet->encrypted = true;
		$paquet->correcteur1_rendu = false;
		// $paquet->correcteur2_rendu = true;
		// $paquet->correcteur3_rendu = true;
		$paquet->responsable_id = 1;
		$paquet->correcteur1_id = 1;
		// $paquet->correcteur2_id = 3;
		// $paquet->correcteur3_id = 4;
		$paquet->encryptor_id = 1;
		$paquet->save();
		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key], 'note' => $randomCodes[$key]%20, 'note1' => $randomCodes[$key]%20]);
		}

		sleep(1);

		$etudiants = Groupe::where('specialite', 'M1 GL')->first()->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());
		$paquet = new Paquet();
		$paquet->module = 'Management du projet informatique';
		$paquet->type = 'EXAM';
		$paquet->type_calcul = 'MAX';
		$paquet->difference = 3;
		$paquet->date_limite_encryptor = Carbon::now()->addDays(5);
		$paquet->date_limite_correcteur1 = Carbon::now()->addDays(15);
		// $paquet->date_limite_correcteur2 = '2019-03-12';
		// $paquet->date_limite_correcteur3 = '2019-03-18';
		// $paquet->responsable_rendu = true;
		// $paquet->encrypted = true;
		// $paquet->correcteur1_rendu = true;
		// $paquet->correcteur2_rendu = true;
		// $paquet->correcteur3_rendu = true;
		$paquet->responsable_id = 1;
		$paquet->correcteur1_id = 1;
		// $paquet->correcteur2_id = 3;
		// $paquet->correcteur3_id = 4;
		// $paquet->encryptor_id = 1;
		$paquet->save();
		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key]]);
		}

		sleep(1);

		$etudiants = Groupe::where('specialite', 'L2 INFO')->first()->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());
		$paquet = new Paquet();
		$paquet->module = 'POO';
		$paquet->type = 'CC';
		$paquet->type_calcul = 'MAX';
		$paquet->difference = 3;
		$paquet->date_limite_encryptor = Carbon::now()->addDays(5);
		$paquet->date_limite_correcteur1 = Carbon::now()->addDays(15);
		$paquet->date_limite_correcteur2 = Carbon::now()->addDays(25);
		// $paquet->date_limite_correcteur3 = '2019-03-18';
		// $paquet->responsable_rendu = true;
		$paquet->encrypted = true;
		$paquet->correcteur1_rendu = true;
		// $paquet->correcteur2_rendu = true;
		// $paquet->correcteur3_rendu = true;
		$paquet->responsable_id = 10;
		$paquet->correcteur1_id = 2;
		$paquet->correcteur2_id = 1;
		// $paquet->correcteur3_id = 4;
		// $paquet->encryptor_id = 1;
		$paquet->save();
		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key]]);
		}

		sleep(1);

		$etudiants = Groupe::where('specialite', 'L2 INFO')->first()->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());
		$paquet = new Paquet();
		$paquet->module = 'Algo';
		$paquet->type = 'CC';
		$paquet->type_calcul = 'MOY';
		$paquet->difference = 3;
		$paquet->date_limite_encryptor = Carbon::now()->addDays(5);
		$paquet->date_limite_correcteur1 = Carbon::now()->addDays(15);
		$paquet->date_limite_correcteur2 = Carbon::now()->addDays(25);
		// $paquet->date_limite_correcteur3 = '2019-03-18';
		// $paquet->responsable_rendu = true;
		$paquet->encrypted = true;
		$paquet->correcteur1_rendu = true;
		// $paquet->correcteur2_rendu = true;
		// $paquet->correcteur3_rendu = true;
		$paquet->responsable_id = 10;
		$paquet->correcteur1_id = 2;
		$paquet->correcteur2_id = 1;
		// $paquet->correcteur3_id = 4;
		// $paquet->encryptor_id = 1;
		$paquet->save();
		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key]]);
		}

		sleep(1);

		$etudiants = Groupe::where('specialite', 'L2 INFO')->first()->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());
		$paquet = new Paquet();
		$paquet->module = 'POO';
		$paquet->type = 'EXAM';
		$paquet->type_calcul = 'MAX';
		$paquet->difference = 3;
		$paquet->date_limite_encryptor = Carbon::now()->addDays(35);
		$paquet->date_limite_correcteur1 = Carbon::now()->addDays(45);
		$paquet->date_limite_correcteur2 = Carbon::now()->addDays(55);
		// $paquet->date_limite_correcteur3 = '2019-03-18';
		// $paquet->responsable_rendu = true;
		$paquet->encrypted = false;
		$paquet->correcteur1_rendu = false;
		// $paquet->correcteur2_rendu = true;
		// $paquet->correcteur3_rendu = true;
		$paquet->responsable_id = 10;
		$paquet->correcteur1_id = 2;
		$paquet->correcteur2_id = 1;
		// $paquet->correcteur3_id = 4;
		// $paquet->encryptor_id = 1;
		$paquet->save();
		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key]]);
		}

		sleep(1);

		$etudiants = Groupe::where('specialite', 'L2 INFO')->first()->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());
		$paquet = new Paquet();
		$paquet->module = 'Algo';
		$paquet->type = 'EXAM';
		$paquet->type_calcul = 'MAX';
		$paquet->difference = 3;
		$paquet->date_limite_encryptor = Carbon::now()->addDays(35);
		$paquet->date_limite_correcteur1 = Carbon::now()->addDays(45);
		$paquet->date_limite_correcteur2 = Carbon::now()->addDays(55);
		// $paquet->date_limite_correcteur3 = '2019-03-18';
		// $paquet->responsable_rendu = true;
		$paquet->encrypted = false;
		$paquet->correcteur1_rendu = false;
		// $paquet->correcteur2_rendu = true;
		// $paquet->correcteur3_rendu = true;
		$paquet->responsable_id = 10;
		$paquet->correcteur1_id = 2;
		$paquet->correcteur2_id = 1;
		// $paquet->correcteur3_id = 4;
		// $paquet->encryptor_id = 1;
		$paquet->save();
		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key]]);
		}
	}
}