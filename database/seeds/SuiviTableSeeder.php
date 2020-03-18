<?php

use App\Modeles\Personne;
use App\Modeles\Suivi;
use App\Modeles\Jeu;
use Illuminate\Database\Seeder;

class   SuiviTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        factory(Suivi::class, 20)->create();
    }
}
