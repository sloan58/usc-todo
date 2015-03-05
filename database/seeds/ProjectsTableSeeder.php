<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Project;
use App\User;

class ProjectsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $users = User::lists('id');

        foreach(range(1, 50) as $index)
        {
            Project::create([

                'user_id' => $faker->randomElement($users),
                'name' => $faker->word

            ]);
        }
    }

}