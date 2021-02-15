<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corredores;
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

$factory->define(Corredores::class, function (Faker $faker) {
    return [
        'nome' => $faker->shuffleString($string = 'Teste', $encoding = 'UTF-8'),
        'cpf' => $faker->numberBetween($min = 0, $max = 21474836478),
        'data_nascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
