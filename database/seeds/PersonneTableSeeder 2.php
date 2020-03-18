<?php

use App\Model\Personne;
use App\Model\Role;
use App\User;
use Illuminate\Database\Seeder;

class PersonneTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create('fr_FR');
        $personnes = factory(Personne::class, 10)->make()
            ->each(function ($personne) use ($faker) {
                $user = factory(User::class)->create([
                    'name' => $personne->prenom . ' ' . $personne->nom,
                    'email' => $personne->prenom . '.' . $personne->nom . '@' . $faker->randomElement(['domain.fr', 'gmail.com', 'hotmail.com', 'truc.com', 'machin.fr']),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ])/*->each(function ($user) {

                })*/;
                $user->role()->save(factory(Role::class)->make());
                $personne->user_id = $user->id;
                $personne->save();
            });
        // Robert Duchmol : joueur
        $user  = factory(User::class)->create([
            'name' => 'Robert Duchmol',
            'email' => 'robert.duchmol@domain.fr',
            'password' => '$2y$10$UFYqX8c1aRFtvZ6AdlV17uesbirEwrRpCz1/fKmFZL2PXSyiHqoG2', // secret
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->role()->save(factory(Role::class)->make(['user_id' => $user->id, 'role' => 'joueur']));
        $personne = factory(Personne::class)->make([
            'nom' => 'Duchmol',
            'prenom' => 'Robert',
            'cv' => 'PersonneResource utilisée en exemple',
        ]);
        $personne->user_id = $user->id;
        $personne->save();
        // Gollum : admin
        $user = factory(User::class)->create([
            'name' => 'Gollum',
            'email' => 'gollum@domain.fr',
            'password' => '$2y$10$UFYqX8c1aRFtvZ6AdlV17uesbirEwrRpCz1/fKmFZL2PXSyiHqoG2', // secret
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->role()->save(factory(Role::class)->make(['user_id' => $user->id, 'role' => 'admin']));
        $personne = factory(Personne::class)->make([
            'nom' => 'Smeagol',
            'prenom' => '',
            'cv' => 'Gollum est un personnage fictif du légendaire créé par l’écrivain britannique J. R. R. Tolkien et qui apparaît dans ses romans Le Hobbit et Le Seigneur des anneaux. Connu en tant que Sméagol à l\'origine, Gollum est un Hobbit de la branche des Forts, qui vivait aux Champs aux Iris vers 2440 T. A..',
            'avatar' => 'avatars/gollum.jpeg',
        ]);
        $personne->user_id = $user->id;
        $personne->save();
        // Gérard Martin : auteur
        $user = factory(User::class)->create([
            'name' => 'Gérard Martin',
            'email' => 'gerard.martin@domain.fr',
            'password' => '$2y$10$UFYqX8c1aRFtvZ6AdlV17uesbirEwrRpCz1/fKmFZL2PXSyiHqoG2', // secret
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->role()->save(factory(Role::class)->make(['user_id' => $user->id, 'role' => 'auteur']));
        $personne = factory(Personne::class)->make([
            'nom' => 'Martin',
            'prenom' => 'Gérard',
            'cv' => 'C\'est lui qui vous propose les jeux'
        ]);
        $personne->user_id = $user->id;
        $personne->save();
    }
}
