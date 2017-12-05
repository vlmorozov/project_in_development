<?php


use App\Models\Company;
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

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'name'       => $faker->name,
        'password'   => $password ?: $password = bcrypt('secret'),
        'login'      => $faker->userName,
        'status'     => 1,
        'company_id' => null,
    ];
});

$factory->state(User::class, 'company', function (Faker $faker) {
    return [
        'company_id' => factory(Company::class)->create()->id,
    ];
});
