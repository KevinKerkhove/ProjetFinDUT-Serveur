<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Personne;
use Faker\Generator as Faker;

$factory->define(Personne::class, function (Faker $faker) {
    $createAt = $faker->dateTimeInInterval(
        $startDate = '-6 months',
        $interval = '+ 180 days',
        $timezone = date_default_timezone_get()
    );
    return [
        'nom' => $faker->lastName(),
        'prenom' => $faker->firstName(),
        'age' => $faker->numberBetween(1,100),
        'actif' => $faker->boolean,
        'avatar' => $faker->imageUrl(),
        'created_at' => $createAt,
        'updated_at' => $faker->dateTimeInInterval(
            $startDate = $createAt,
            $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            $timezone = date_default_timezone_get()
        ),
    ];
});
