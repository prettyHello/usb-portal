<?php
/**
 * Created by PhpStorm.
 * User: franckfadeur
 * Date: 12/11/17
 * Time: 3:11 PM
 */

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

$factory->define(App\Document::class, function (Faker $faker) {

    return [
        'name' => $faker->name . '.pdf',
        'extension' => $faker->fileExtension,
        'id_user' => $faker->numberBetween(1,10)
    ];
});