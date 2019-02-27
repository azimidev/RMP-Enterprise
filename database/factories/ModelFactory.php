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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'api_token' => str_random(60),
    ];
});

$factory->define(\App\Models\Student::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->name,
        'surname' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'nationality' => $faker->country,
        'address_id' => rand(1, 89)
    ];
});

$factory->define(\App\Models\Course::class, function (Faker\Generator $faker) {
    return [
        'course_name' => $faker->sentence(3),
        'university_id' => function () {
            return factory(\App\Models\University::class)->create()->id;
        }
    ];
});

$factory->define(\App\Models\University::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(3)
    ];
});