<?php

use App\Modeles\Jeu;
use Illuminate\Database\Seeder;

class JeuTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Jeu::class, 10)->create();
    }
}
