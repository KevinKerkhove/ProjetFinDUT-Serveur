<?php

use App\Modeles\Personne;
use App\Modeles\Jeu;
use Illuminate\Database\Seeder;

class PersonneJeuTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Personne::class, 6)->create();
        factory(Jeu::class, 6)->create();
    }
}
