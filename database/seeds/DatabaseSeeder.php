<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersCollectionSeeder::class);
        $this->call(PostsCollectionSeeder::class);
    }
}
