<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use \App\Model\Module;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Module::class, function (Faker $faker) {
    $createAt = $faker->dateTimeInInterval(
        $startDate = '-6 months',
        $interval = '+ 180 days',
        $timezone = date_default_timezone_get()
    );
    return [
        'nom' => $faker->word,
        'nbHeuresTotal' => $faker->numberBetween(30, 45),
        'created_at' => $createAt,
        'updated_at' => $faker->dateTimeInInterval(
            $startDate = $createAt,
            $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            $timezone = date_default_timezone_get()
        ),
    ];
});
