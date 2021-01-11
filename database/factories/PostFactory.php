<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'preview' => $faker->text(150),
        'read_more' => $faker->text(500),
        'author' => $faker->name,
    ];
});
