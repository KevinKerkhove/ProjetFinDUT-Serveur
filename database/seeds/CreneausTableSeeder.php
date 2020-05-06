<?php

use \App\Model\Creneau;
use App\User;
use Illuminate\Database\Seeder;

class CreneausTableSeeder extends Seeder
{
    public function run() {
        /*$users_ids = User::all('id')->pluck('id')->toArray();
        $faker = Faker\Factory::create('fr_FR');
        factory(Creneau::class, 10)->make()
            ->each(function ($personne) use ($users_ids, $faker) {
                $personne->user_id = $faker->randomElement($users_ids);
                $ens = User::find($personne->user_id);
                $ens->save();
            });*/

        $creneau = factory(Creneau::class)->create([
            'nom_cours' => 'PWEB',
            'dateDeDebut' => '2020-04-05',
            'duree' => 1,
            'idSalle' => 1,
            'idEnseignant' => 5,
        ]);
        $creneau->save();
    }

}
