<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tarea;
use Faker\Generator as Faker;

$factory->define(Tarea::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'prioridad' => $faker->word,
        'fecha_inicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'fecha_fin' => $faker->date($format = 'Y-m-d', $max = 'now'),
       // 'id_user' => $faker->numberBetween($min = 0, $max = 5)
      
    ];
});
