<?php

use Illuminate\Database\Seeder;
use \App\Model\Module;

class ModulesTableSeeder extends Seeder {

    public function run(){
        factory(Module::class, 10)->create();
    }
}
