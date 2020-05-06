<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use \App\Model\Salle;

class SallesTableSeeder extends Seeder {

    public function run(){
        factory(Salle::class, 20)->create();
    }
}
