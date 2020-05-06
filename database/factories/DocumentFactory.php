<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use \App\Model\Document;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;


$factory->define(Document::class, function (Faker $faker) {
    $createAt = $faker->dateTimeInInterval(
        $startDate = '-6 months',
        $interval = '+ 180 days',
        $timezone = date_default_timezone_get()
    );
    return [
        'piece' => $faker->word,
        'idAbsence' => random_int(DB::table('absences')->min('id'), DB::table('absences')->max('id')),
        'created_at' => $createAt,
        'updated_at' => $faker->dateTimeInInterval(
            $startDate = $createAt,
            $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
            $timezone = date_default_timezone_get()
        ),
    ];
});
