<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Position::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(\App\Models\Position::class, 'position_category', function (Faker $faker) {
    return [
        'position_category_id' => factory(\App\Models\PositionCategory::class)->create()->id,
    ];
});