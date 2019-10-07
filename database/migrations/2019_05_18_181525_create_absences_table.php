<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsencesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('absences', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->date('date');
			$table->boolean('presence')->default(false);
			$table->boolean('justified')->default(false);
			$table->string('justification')->nullable();

			$table->unsignedBigInteger('seance_id');
			$table->unsignedBigInteger('etudiant_id');

			$table->foreign('seance_id')->references('id')->on('seances')->onDelete('cascade');
			$table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');

//			$table->primary(['date', 'seance_id', 'etudiant_id']);

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
		Schema::dropIfExists('absences');
	}
}
