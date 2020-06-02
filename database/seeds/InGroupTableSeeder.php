<?php

use \Illuminate\Database\Seeder;
use \App\Model\Groupe;

class InGroupTableSeeder extends Seeder
{
    public function run(){
        $affectation = factory(Groupe::class)->create([
            'idEtudiant' =>  1,
            'idGroupe' => 1,
        ]);
        $affectation->save();
    }
}
