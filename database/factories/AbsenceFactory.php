<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use \App\Model\Absence;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


$factory->define(Absence::class, function (Faker $faker) {
    $createAt = $faker->dateTimeInInterval(
        $startDate = '-6 months',
        $interval = '+ 180 days',
        $timezone = date_default_timezone_get()
    );
    return [
        'motif' => $faker->word,
        'justifiee' => $faker->boolean,
        'document' => $faker->word,
        'idEtudiant' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
        'idCreneau' => random_int(DB::table('creneaux')->min('id'), DB::table('creneaux')->max('id')),
        'created_at' => $createAt,
        'updated_at' => $faker->dateTimeInInterval(
            $startDate = $createAt,
            $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            $timezone = date_default_timezone_get()
        ),
    ];
});
