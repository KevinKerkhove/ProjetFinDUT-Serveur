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
                    'email' => $personne->prenom . '.' . $personne->nom . '@' . $faker->randomElement(['domain.fr', 'gmail.com']),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]);
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
            'age' => 31,
            'actif' => 0,
        ]);
        $personne->user_id = $user->id;
        $personne->save();
        // Etienne Doutrelon : admin
        $user = factory(User::class)->create([
            'name' => 'Etienne Doutrelon',
            'email' => 'etiennedoutrelon@gmail.com',
            'password' => '$2y$10$UFYqX8c1aRFtvZ6AdlV17uesbirEwrRpCz1/fKmFZL2PXSyiHqoG2', // secret
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->role()->save(factory(Role::class)->make(['user_id' => $user->id, 'role' => 'admin']));
        $personne = factory(Personne::class)->make([
            'nom' => 'Doutrelon',
            'prenom' => 'Etienne',
            'age' => 20,
            'actif' => 1,
            'avatar' => 'avatars/etienne_avatar.jpeg',
        ]);
        $personne->user_id = $user->id;
        $personne->save();
        // Bernard Dujardin : auteur
        $user = factory(User::class)->create([
            'name' => 'Bernard Dujardin',
            'email' => 'Bernard_Dujardin@domain.fr',
            'password' => '$2y$10$UFYqX8c1aRFtvZ6AdlV17uesbirEwrRpCz1/fKmFZL2PXSyiHqoG2', // secret
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->role()->save(factory(Role::class)->make(['user_id' => $user->id, 'role' => 'auteur']));
        $personne = factory(Personne::class)->make([
            'nom' => 'Dujardin',
            'prenom' => 'Bernard',
            'age' => 53,
            'actif' => 0,
        ]);
        $personne->user_id = $user->id;
        $personne->save();
    }
}
