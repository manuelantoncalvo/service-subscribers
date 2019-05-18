<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $x = 1;
        while($x <= 10) {
            User::create(['name' => $faker->name, 'email' => $faker->email]);
            $x++;
        }

    }
}