<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJeuPersonneTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('jeu_personne', function (Blueprint $table) {
            $table->bigInteger('jeu_id')->unsigned();
            $table->bigInteger('personne_id')->unsigned();
            $table->foreign('jeu_id')->references('id')->on('jeus')->onDelete('cascade');
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('jeu_personne');
    }
}
