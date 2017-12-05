<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PositionCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});
