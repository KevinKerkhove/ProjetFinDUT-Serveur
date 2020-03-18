<?php

use App\Modeles\Personne;
use App\User;
use Illuminate\Database\Seeder;

class PersonneTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Personne::class, 20)->create();
    }
}
