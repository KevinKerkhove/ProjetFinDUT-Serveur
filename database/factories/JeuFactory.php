<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modeles\Jeu;
use Faker\Generator as Faker;

$factory->define(Jeu::class, function (Faker $faker) {
    $createAt = $faker->dateTimeInInterval(
        $startDate = '-6 months',
        $interval = '+ 180 days',
        $timezone = date_default_timezone_get()
    );
    return [
        'description' => $faker->paragraph,
        'categorie' => $faker->randomElement($array = array('Histoire', 'Multi', 'Arcade')),
        'fini' => $faker->randomElement($array = array('O', 'N')),
        'name' => $faker->word,
        'created_at' => $createAt,
        'updated_at' => $faker->dateTimeInInterval(
            $startDate = $createAt,
            $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            $timezone = date_default_timezone_get()
        ),
    ];
});
