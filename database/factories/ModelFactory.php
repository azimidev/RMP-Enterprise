<?php

$factory->define(App\Models\User::class, function(Faker\Generator $faker) {
	static $password;

	return [
		'name'           => $faker->name,
		'email'          => $faker->unique()->safeEmail,
		'password'       => $password ?: $password = bcrypt('secret'),
		'remember_token' => str_random(10),
		'api_token'      => str_random(60),
	];
});

$factory->define(App\Models\Course::class, function(Faker\Generator $faker) {
	return [
		'course_name' => $faker->word,
		'university'  => $faker->word,
	];
});

$factory->define(App\Models\StudentAddress::class, function(Faker\Generator $faker) {
	return [
		'houseNo'  => $faker->randomDigit,
		'line_1'   => $faker->streetName,
		'line_2'   => '',
		'postcode' => $faker->postcode,
		'city'     => $faker->city,
	];
});

$factory->define(App\Models\Student::class, function(Faker\Generator $faker) {
	return [
		'firstname'   => $faker->name,
		'surname'     => $faker->lastName,
		'email'       => $faker->email,
		'nationality' => $faker->country,
		'address_id'  => factory(App\Models\StudentAddress::class),
		'course_id'   => factory(App\Models\Course::class),
	];
});
