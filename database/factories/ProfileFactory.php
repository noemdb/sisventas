<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Profile Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Profile::class, function (Faker $faker) {

    $arr_roles = [''=>'','1'=>'1'];
    $arr_admin = ['Administrador'=>'Administrador','Usuario'=>'Usuario'];
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        // 'url_img' => $faker->imageUrl,
        'is_admin' => array_rand($arr_admin,1),
        'is_user1' => array_rand($arr_roles,1),
        'is_user2' => array_rand($arr_roles,1),
        'is_user3' => array_rand($arr_roles,1),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
