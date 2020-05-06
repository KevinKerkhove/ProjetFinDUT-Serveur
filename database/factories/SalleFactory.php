<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use \App\Model\Salle;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Salle::class, function (Faker $faker) {
    $createAt = $faker->dateTimeInInterval(
        $startDate = '-6 months',
        $interval = '+ 180 days',
        $timezone = date_default_timezone_get()
    );
    return [
        'nom' => $faker->word,
        'place' => $faker->word,
        'created_at' => $createAt,
        'updated_at' => $faker->dateTimeInInterval(
            $startDate = $createAt,
            $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            $timezone = date_default_timezone_get()
        ),
    ];
});
