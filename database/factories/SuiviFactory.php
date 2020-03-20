<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Suivi;
use Faker\Generator as Faker;

$factory->define(Suivi::class, function (Faker $faker) {
    $createAt = $faker->dateTimeInInterval(
        $startDate = '-6 months',
        $interval = '+ 180 days',
        $timezone = date_default_timezone_get()
    );
    return [
        'temps_jeu' => $faker->time(),
        'score' => $faker->randomNumber(),
        'created_at' => $createAt,
        'updated_at' => $faker->dateTimeInInterval(
            $startDate = $createAt,
            $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            $timezone = date_default_timezone_get()
        ),
    ];
});
