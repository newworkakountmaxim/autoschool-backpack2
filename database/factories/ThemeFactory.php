<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Theme::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'description' => $faker->text(30),
        'user_id' => 1
    ];
});
