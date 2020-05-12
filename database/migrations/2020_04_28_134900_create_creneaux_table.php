<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreneauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creneaux', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateDeDebut');
            $table->integer('duree');
            $table->string('salle');
            $table->unsignedBigInteger('idModule')->nullable();
            $table->foreign('idModule')->references('id')->on('modules')->onDelete('cascade');
            $table->unsignedBigInteger('idGroupe')->nullable();
            $table->foreign('idGroupe')->references('id')->on('groupes')->onDelete('cascade');
            $table->unsignedBigInteger('idEnseignant')->nullable();
            $table->foreign('idEnseignant')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('creneaux');
    }
}
