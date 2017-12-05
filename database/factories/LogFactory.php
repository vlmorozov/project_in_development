<?php


use App\Models\Log;
use App\Models\User;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Log::class, function (Faker $faker) {
    static $types = [
        'user_login',
        'incoming_call',
        'contact_event',
    ];

    static $operationTypes = [
        'create',
        'update',
        'delete',
    ];

    return [
        'object_type'    => $faker->randomElement($types),
        'object_id'      => $faker->randomDigit,
        'operation_type' => $faker->randomElement($operationTypes),
        'operation_date' => $faker->dateTime,
        'user_id'        => null,
        'operation_data' => [],
        'current_data'   => [],
    ];
});

$factory->state(Log::class, 'user', function(Faker $faker) {
    return [
        'user_id'        => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
