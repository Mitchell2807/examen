<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Movie::class, 20)->create()
        ->each(function($movie) {
            $movie->reservation()->saveMany(factory(\App\Reservation::class, rand(0,5))
            ->create(['movie_id' => $movie->id]));
        });
    }
}
