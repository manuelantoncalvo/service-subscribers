<?php

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\User;
use \Carbon\Carbon;

class SubscriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Service::all()->each(function ($service) {
            User::all()->each(function ($user) use ($service) {
                $service->users()->attach($user, ['subscribe_at' => Carbon::now()]);
            });
        });

    }
}