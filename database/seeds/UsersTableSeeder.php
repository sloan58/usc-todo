<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            User::create([

                'name' => $faker->word . $index,
                'email' => $faker->email,
                'password' => 'secret'

            ]);
        }
    }

}