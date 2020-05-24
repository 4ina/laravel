<?php

use App\Tweet;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->filter(function ($user) {
            factory(Tweet::class, 10)->create(['user_id' => $user->id]);
        });
    }
}
