<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resultados;
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

$factory->define(Resultados::class, function (Faker $faker) {
    return [
        'corredores_id' => $faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
        'provas_id' => $faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
        'hora_inicio' => $faker->time($format = 'H:i:s', $max = 'now'),
        'hora_conclusao' => $faker->time($format = 'H:i:s', $max = 'now'),
    ];
});
