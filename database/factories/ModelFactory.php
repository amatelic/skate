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

//Go to tinker and write factory("App\User")->create();
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'anze',
        'email' => 'amatelic94@gmail.com',
        'rights' => 'IV',
        'password' => bcrypt('anma13'),
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'updated_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'body' => $faker->text,
        'image_dir' => $faker->colorName
    ];
});

$factory->define(App\Notification::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'atttendenc' => '1,0,1,0,1,0',
    ];
});
