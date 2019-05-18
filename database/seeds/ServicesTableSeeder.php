<?php

use Illuminate\Database\Seeder;
use App\Models\Service;
use Faker\Factory;

class ServicesTableSeeder extends Seeder
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
            Service::create(['name' => $faker->domainName]);
            $x++;
        }

    }
}