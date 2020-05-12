<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->text('motif');
            $table->boolean('justifiee');
            $table->string('document')->nullable(true);
            $table->bigInteger('idEtudiant')->unsigned();
            $table->foreign('idEtudiant')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('idCreneau')->unsigned();
            $table->foreign('idCreneau')->references('id')->on('creneaux')->onDelete('cascade');
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
