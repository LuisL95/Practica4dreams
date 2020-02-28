<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Libro;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(App\Libro::class, function (Faker $faker) {

    $genero1 = DB::table('genres')->where ( ['id'=> '1'] )->value('nombre');
    //$genero2 = DB::table('genres')->where ['id'=> '2'] ->value('nombre');
    $autor = DB::table('autores')->where ( ['id'=> '1'] )->value('nombre');

    return [


     //  $generos = DB::select('SELECT id FROM genres WHERE nombre = "terror"')

       

        'nombre' => $faker->sentence,
        'autor_id' => 1,
        'resumen' => $faker->paragraph,
        'npagina' => $faker->randomDigit,
        'edicion' => $faker->randomDigit,
        'genero' => $genero1,
        'autor' => $autor,
        'precio' => $faker->numberBetween($min = 300, $max = 500) ,
       

    ];
});
