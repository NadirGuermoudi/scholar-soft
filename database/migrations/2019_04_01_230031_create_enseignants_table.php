<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enseignants', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('matricule')->unique();
			$table->string('nom');
			$table->string('prenom');
			$table->date('date_naissance')->nullable();
			$table->enum('grade', ['MAA', 'MAB', 'MCA', 'MCB', 'Doctorant', 'Professeur']);
			$table->boolean('admin')->default(false);
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('enseignants');
	}
}
