<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\post;
use App\Autor;
use Faker\Generator as Faker;

$factory->define(\App\Autor::class, function (Faker $faker) {
    return [

        'nombre' => $faker ->firstName,
        'apellido' => $faker ->lastName,
        'fechaNacimiento' => $faker ->word,
        'nacionalidad'  => $faker ->country,
    ];
    
});

