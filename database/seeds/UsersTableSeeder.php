<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
/*        factory(App\User::class, 3)->create()
            ->each(function ($user) {
                $user->role()->save(factory(Role::class)->make());
            });*/

        $user = factory(App\User::class)->create([
            'nom' => 'El Mazroui',
            'prenom' => 'Kamel',
            'dateDeNaiss' => '1999-12-30',
            'email' => 'kamel@gmail.com',
            'email_verified_at' => now(),
            'avatar' => null,
            'grade' => false,
            'role' => 'etudiant',
            'password' => '$2y$10$DjPwcE/APOvpnc6QKSlaNuZ0pKeKS2gysCrCWEcTx9uZzZu8x66UG', //secret
            'remember_token' => Str::random(10),
        ]);
        $user->save();

        $user2 = factory(App\User::class)->create([
            'nom' => 'Duchmol',
            'prenom' => 'Bernard',
            'dateDeNaiss' => '1970-05-12',
            'email' => 'bernard@gmail.com',
            'email_verified_at' => now(),
            'avatar' => null,
            'grade' => false,
            'role' => 'enseignant',
            'password' => '$2y$10$DjPwcE/APOvpnc6QKSlaNuZ0pKeKS2gysCrCWEcTx9uZzZu8x66UG', //secret
            'remember_token' => Str::random(10),
        ]);
        $user2->save();

        $user3 = factory(App\User::class)->create([
            'nom' => 'Duchmol',
            'prenom' => 'Lola',
            'dateDeNaiss' => '1980-08-11',
            'email' => 'lola@gmail.com',
            'email_verified_at' => now(),
            'avatar' => null,
            'grade' => false,
            'role' => 'secretariat',
            'password' => '$2y$10$DjPwcE/APOvpnc6QKSlaNuZ0pKeKS2gysCrCWEcTx9uZzZu8x66UG', //secret
            'remember_token' => Str::random(10),
        ]);
        $user3->save();

        $user4 = factory(App\User::class)->create([
            'nom' => 'Duchmol',
            'prenom' => 'Robert',
            'dateDeNaiss' => '1965-11-04',
            'email' => 'robert@gmail.com',
            'email_verified_at' => now(),
            'avatar' => null,
            'grade' => false,
            'role' => 'administrateur',
            'password' => '$2y$10$DjPwcE/APOvpnc6QKSlaNuZ0pKeKS2gysCrCWEcTx9uZzZu8x66UG', //secret
            'remember_token' => Str::random(10),
        ]);
        $user4->save();

        $user5 = factory(App\User::class)->create([
            'nom' => 'Dupont',
            'prenom' => 'Sam',
            'dateDeNaiss' => '1973-07-17',
            'email' => 'sam@gmail.com',
            'email_verified_at' => now(),
            'avatar' => null,
            'grade' => true,
            'role' => 'enseignant',
            'password' => '$2y$10$DjPwcE/APOvpnc6QKSlaNuZ0pKeKS2gysCrCWEcTx9uZzZu8x66UG', //secret
            'remember_token' => Str::random(10),
        ]);
        $user5->save();
    }
}
