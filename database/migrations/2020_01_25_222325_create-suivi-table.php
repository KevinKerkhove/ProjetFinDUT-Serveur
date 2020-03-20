<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuiviTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('suivis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('temps_jeu');
            $table->string('score', 70)->nullable(false);
            $table->bigInteger('jeu_id')->unsigned()->nullable(true);
            $table->foreign('jeu_id')->references('id')->on('jeus');
            $table->bigInteger('personne_id')->unsigned()->nullable(true);
            $table->foreign('personne_id')->references('id')->on('personnes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('suivis');
    }
}
