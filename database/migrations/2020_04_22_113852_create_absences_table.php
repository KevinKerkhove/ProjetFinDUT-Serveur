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
            $table->string('motif', 50)->nullable(false);
            $table->boolean('justifiee');
            $table->bigInteger('idEtudiant')->nullable(false);
            $table->foreign('idEtudiant')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('idDocument')->nullable();
            $table->foreign('idDocument')->references('id')->on('documents')->onDelete('cascade');
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
