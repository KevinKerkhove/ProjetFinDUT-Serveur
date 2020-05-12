<?php

use App\User;
use \Illuminate\Database\Seeder;
use \App\Model\Absence;

class AbsencesTableSeeder extends Seeder {
    public function run() {
        /*$users_ids = User::all('id')->pluck('id')->toArray();
        $faker = Faker\Factory::create('fr_FR');
        factory(Absence::class, 10)->make()
            ->each(function ($personne) use ($users_ids, $faker) {
                $personne->user_id = $faker->randomElement($users_ids);
                $etu = User::find($personne->user_id);
                $etu->save();
            });*/

        $absence = factory(Absence::class)->create([
            'motif' => 'RDV MEDICAL',
            'justifiee' => false,
            'document' => 'null',
            'idEtudiant' => 1,
            'idCreneau' => 1,
        ]);
        $absence->save();

    }
}
