<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



// factory de CATALOGO
$factory->define(App\Catalogo::class, function (Faker\Generator $faker) {
    return [
        'modelo' => $faker->name,
        'acceso' => bcrypt(str_random(10)),
    ];
});


//Factory de PREDETERMINADO
$factory->define(App\Predeterminado::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'catalogo_id' => 1,
        'descripcion' => $faker->text,
        'precio' => 1000,
        'url_img' => str_random(10),
        'proveedor' => str_random(10),
    ];
});


//Factory para Clase Escoger
$factory->define(App\Escoger::class, function (Faker\Generator $faker) {
    return [
        'catalogo_id' => 1,
        'seccion' => $faker->name,
    ];
});


$factory->define(App\EscogerOptions::class, function (Faker\Generator $faker) {
    return [
        'escoger_id' => 3,
        'nombre' => $faker->name,
        'descripcion' => $faker->text,
        'precio' => 1000,
        'url_img' => str_random(10),
        'proveedor' => str_random(10),
    ];
});
//Factory para Clase Opcional
$factory->define(App\Opcional::class, function (Faker\Generator $faker) {
    return [
        'catalogo_id' => 1,
        'seccion' => $faker->name,
    ];
});


$factory->define(App\OpcionalOptions::class, function (Faker\Generator $faker) {
    return [
        'opcional_id' => 3,
        'nombre' => $faker->name,
        'descripcion' => $faker->text,
        'precio' => 1000,
        'url_img' => str_random(10),
        'proveedor' => str_random(10),
    ];
});

//Arquitecto
$factory->define(App\Arquitecto::class, function (Faker\Generator $faker) {
    return [
        'catalogo_id' => 1,
        'nombre' => $faker->name,
        'descripcion' => $faker->text,
        'url_img' => str_random(10),
    ];
});

// factory de TAX
$factory->define(App\Tax::class, function (Faker\Generator $faker) {
    return [
        'catalogo_id' => 1,
        'concepto' => $faker->name,
        'monto' => .134,
    ];
});

