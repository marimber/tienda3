<?php

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $users = User::all();
    $user_ids = array();
    foreach($users as $user)
    {
        $user_ids[] = $user->id;
    }

    $user_id = $user_ids[array_rand($user_ids)];
    Storage::disk('public')->makeDirectory('posts/'.$user_id);
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'img' => $faker->image('public/storage/posts/'.$user_id, 400, 300, null, false),
        'tags' => $faker->words($nb = 3, $asText = false),
        'user_id' => $user_id,
    ];
});