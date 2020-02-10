<?php

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		User::create([
			'name'           => $faker->name,
			'email'          => $faker->unique()->safeEmail,
			'password'       => bcrypt('secret-password'),
			'remember_token' => str_random(10),
			'api_token'      => str_random(60),
		]);
	}
}
