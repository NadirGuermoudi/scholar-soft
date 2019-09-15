<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Enseignant;

class EnseignantsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$enseignant = new Enseignant();
		$enseignant->matricule = Str::random(10);
		$enseignant->nom = 'MESSABIHI';
		$enseignant->prenom = 'Mohamed';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = true;
		$enseignant->email = 'messabihi.mohamed@gmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654321';
		$enseignant->nom = 'TEDLAOUI';
		$enseignant->prenom = 'Mohamed';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'mtadlaoui@hotmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654322';
		$enseignant->nom = 'SELADJI';
		$enseignant->prenom = 'Yassamine';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'yassamine.seladji@gmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654323';
		$enseignant->nom = 'BENMAMMAR';
		$enseignant->prenom = 'Badr';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'badr.benmammar@gmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654325';
		$enseignant->nom = 'CHAOUCHE';
		$enseignant->prenom = 'Lamia';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'chaouche_lamia@yahoo.fr';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654326';
		$enseignant->nom = 'KHIRTI';
		$enseignant->prenom = 'Souhila';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'khitri_s@yahoo.fr';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654327';
		$enseignant->nom = 'HALFAOUI';
		$enseignant->prenom = 'Amal';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'amal.halfaoui@gmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654328';
		$enseignant->nom = 'MAHFOUD';
		$enseignant->prenom = 'Houari';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'mahfoud.houari@gmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654329';
		$enseignant->nom = 'BOUBRIS';
		$enseignant->prenom = 'Anas';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'anas.boubris@gmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654330';
		$enseignant->nom = 'BRIXI';
		$enseignant->prenom = 'Nigasa';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'brixi.nigasa@gmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();

		$enseignant = new Enseignant();
		$enseignant->matricule = '897654331';
		$enseignant->nom = 'ZIANI';
		$enseignant->prenom = 'Cherif';
		$enseignant->date_naissance = '1988-01-01';
		$enseignant->grade = 'MCB';
		$enseignant->admin = false;
		$enseignant->email = 'ziani.cherif@gmail.com';
		$enseignant->password = bcrypt('password');
		$enseignant->save();
	}

	// $table->bigIncrements('id');
	// $table->string('matricule');
	// $table->string('nom');
	// $table->string('prenom');
	// $table->date('date_naissance')->nullable();
	// $table->string('grade');
	// $table->boolean('admin')->default(false);
	// $table->string('email')->unique();
	// $table->string('password');
	// $table->rememberToken();
	// $table->timestamps();
}
