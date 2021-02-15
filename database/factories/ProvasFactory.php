<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provas;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Provas::class, function (Faker $faker) {
    return [
        'tipo_prova' => $faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
        'data' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
