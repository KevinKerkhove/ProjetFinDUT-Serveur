<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inGroup', function (Blueprint $table) {
            $table->unsignedbigInteger('idEtudiant')->nullable(false);
            $table->foreign('idEtudiant')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedbigInteger('idGroupe')->nullable(false);
            $table->foreign('idGroupe')->references('id')->on('groupes')->onDelete('cascade');
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
        Schema::dropIfExists('inGroup');
    }
}
