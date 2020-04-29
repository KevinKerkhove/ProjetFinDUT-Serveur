<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreneausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creneaus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_cours', 10)->nullable(false);
            $table->date('dateDeDebut')->nullable(false);
            $table->time('duree', 0)->nullable(false);
            $table->bigInteger('idSalle')->nullable();
            $table->foreign('idSalle')->references('id')->on('salles')->onDelete('cascade');
            $table->bigInteger('idEnseignant')->nullable();
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
        Schema::dropIfExists('creneaus');
    }
}
