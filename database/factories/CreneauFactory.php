<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use \App\Model\Creneau;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


$factory->define(Creneau::class, function (Faker $faker) {
    $createAt = $faker->dateTimeInInterval(
        $startDate = '-6 months',
        $interval = '+ 180 days',
        $timezone = date_default_timezone_get()
    );
    return [
        'dateDeDebut' => $faker->dateTimeBetween('-1 years', '+1 years'),
        'duree' => $faker->numberBetween(60, 90),
        'salle' => $faker->word,
        'idModule' => random_int(DB::table('modules')->min('id'), DB::table('modules')->max('id')),
        'idGroupe' => random_int(DB::table('groupes')->min('id'), DB::table('groupes')->max('id')),
        'idEnseignant' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
        'created_at' => $createAt,
        'updated_at' => $faker->dateTimeInInterval(
            $startDate = $createAt,
            $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            $timezone = date_default_timezone_get()
        ),
    ];
});
