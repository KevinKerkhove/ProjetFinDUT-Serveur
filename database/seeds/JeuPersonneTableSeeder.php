<?php


use App\Model\Jeu;
use App\Model\Personne;

class JeuPersonneTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
/*        $jeux = Jeu::all();
        $personnes_id = Personne::all('id')->pluck('id')->toArray();
        $faker = Faker\Factory::create('fr_FR');

        foreach ($jeux as $jeu) {
            $nbPersonnes = $faker->numberBetween($min = 1, $max = 10);
            $id_personnes = $faker->unique()
                ->randomElements($personnes_id, $nbPersonnes);
            $jeu->personnes()->attach($id_personnes);
            $jeu->save();
        }*/
    }
}
