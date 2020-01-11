<?php
/**
 * Created by PhpStorm.
 * User: yusuf
 * Date: 4/19/2019
 * Time: 3:26 PM
 */
use App\Publisher;
use Illuminate\Support\Str;
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

$factory->define(Publisher::class, function (Faker $faker) {
    return [
        'publisher_name' => $faker->name,
        'publisher_info' => $faker->title,

    ];
});
