<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Folder;
use Faker\Generator as Faker;

$factory->define(Folder::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'user_id' => 1,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
