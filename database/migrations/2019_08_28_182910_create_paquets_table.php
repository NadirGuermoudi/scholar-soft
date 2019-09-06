<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaquetsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paquets', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('module');
			$table->enum('type', ['CC', 'EXAM']);
			$table->enum('type_calcul', ['MOY', 'MAX']);
			$table->integer('difference')->default(2);
			$table->date('date_limite_encryptor')->nullable();
			$table->date('date_limite_correcteur1')->nullable();
			$table->date('date_limite_correcteur2')->nullable();
			$table->date('date_limite_correcteur3')->nullable();
			$table->boolean('responsable_rendu')->default(false);
			$table->boolean('encrypted')->default(false);
			$table->boolean('correcteur1_rendu')->default(false);
			$table->boolean('correcteur2_rendu')->default(false);
			$table->boolean('correcteur3_rendu')->default(false);

			$table->unsignedBigInteger('responsable_id')->nullable();
			$table->unsignedBigInteger('correcteur1_id')->nullable();
			$table->unsignedBigInteger('correcteur2_id')->nullable();
			$table->unsignedBigInteger('correcteur3_id')->nullable();
			$table->unsignedBigInteger('encryptor_id')->nullable();

			$table->foreign('responsable_id')->references('id')->on('enseignants')->onDelete('cascade');
			$table->foreign('correcteur1_id')->references('id')->on('enseignants')->onDelete('set null');
			$table->foreign('correcteur2_id')->references('id')->on('enseignants')->onDelete('set null');
			$table->foreign('correcteur3_id')->references('id')->on('enseignants')->onDelete('set null');
			$table->foreign('encryptor_id')->references('id')->on('encryptors')->onDelete('set null');

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
		Schema::dropIfExists('paquets');
	}
}
