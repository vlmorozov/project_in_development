<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Department::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(\App\Models\Department::class, 'company', function (Faker $faker) {
    return [
        'company_id' => factory(\App\Models\Company::class)->create()->id,
    ];
});