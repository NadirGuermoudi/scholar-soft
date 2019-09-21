<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notes', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedInteger('code');
			$table->double('note')->nullable();
			$table->double('note1')->nullable();
			$table->double('note2')->nullable();
			$table->double('note3')->nullable();

			$table->unsignedBigInteger('etudiant_id')->nullable();
			$table->unsignedBigInteger('paquet_id')->nullable();

			$table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');
			$table->foreign('paquet_id')->references('id')->on('paquets')->onDelete('cascade');

			// $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('notes');
	}
}
