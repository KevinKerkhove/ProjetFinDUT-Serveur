<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJeuTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('jeus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->string('categorie')->default('Histoire')->nullable(false);
            $table->enum('fini', ['O', 'N'])->default('N')->nullable(false);
            $table->string('name')->default('????')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('jeus');
    }
}
