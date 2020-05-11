<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        //vullen van deze kolommen in de tabel movies.
        'user_id' => \App\User::all()->random()->id,
        'time' => $faker->dateTimeThisDecade('now', null),
        'quantity' => $faker->numberBetween(1,10),
        'created_at' => $faker->dateTimeThisDecade('now', null),
        'updated_at' => $faker->dateTimeThisDecade('now', null)
    ];
});
