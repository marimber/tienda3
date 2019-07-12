<?php

use Illuminate\Database\Seeder;

class UsersCollectionSeeder extends Seeder
{

    public function run()
    {
        factory(App\User::class, 5)->create();
    }
}
