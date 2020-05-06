<?php

use Illuminate\Database\Seeder;
use \App\Model\Groupe;

class GroupesTableSeeder extends Seeder {

    public function run(){
        factory(Groupe::class, 20)->create();
    }
}
