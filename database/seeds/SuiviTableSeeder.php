<?php

use App\Model\Suivi;
use App\Model\Jeu;
use Illuminate\Database\Seeder;

class   SuiviTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
/*        $jeuxId = Jeu::all('id')->pluck('id')->toArray();
        $faker = Faker\Factory::create('fr_FR');
        factory(Suivi::class, 100)->make()
            ->each(function ($suivi) use ($jeuxId, $faker) {
                $suivi->jeu_id = $faker->randomElement($jeuxId);
                $jeu = Jeu::find($suivi->jeu_id);
                $personnesId = $jeu->personnes->pluck('id')->toArray();
                $suivi->personne_id = $faker->randomElement($personnesId);
                $suivi->save();
            });*/
    }
}
