<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Todo;
use App\Project;
use App\User;

class TodosTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $users = User::lists('id');
        $projects = Project::lists('id');

        foreach(range(1, 50) as $index)
        {
            Todo::create([

                'user_id' => $faker->randomElement($users),
                'project_id' => $faker->randomElement($projects),
                'name' => $faker->word,
                'completed' => $faker->boolean(),
                'urgent' => $faker->boolean(),
                'description' => $faker->sentence()

            ]);
        }
    }

}