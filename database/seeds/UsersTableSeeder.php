<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 25)->create();

        factory(App\User::class, 1)->create(['name' => 'admin',
        'email' => 'admin@mail.nl',
        'password' => bcrypt('admin123')]);
    }
}
