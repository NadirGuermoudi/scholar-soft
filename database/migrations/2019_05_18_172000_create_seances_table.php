<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['Cours', 'TD', 'TP']);
            $table->string('module');
            $table->enum('jour', ['DIMANCHE', 'LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI', 'SAMEDI']);
            $table->time('heur_debut');
            $table->time('heur_fin');

            $table->unsignedBigInteger('salle_id')->nullable();
            $table->unsignedBigInteger('enseignant_id')->nullable();
            
            // $table->timestamps();

            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('set null');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
