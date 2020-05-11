<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        //vullen van deze kolommen in de tabel movies.
        'movieName' => $faker->name,
        'description' => $faker->paragraph(50),
        'price' => $faker->randomFloat(2,1,25),
        'created_at' => $faker->dateTimeThisDecade('now', null),
        'updated_at' => $faker->dateTimeThisDecade('now', null)
    ];
});
