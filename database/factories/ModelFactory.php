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
    'email' => $faker->safeEmail,
    'isAdmin' => 0,
    'verified' => 1,
    'token' => str_random(30),
    'password' => bcrypt(str_random(10)),
    'remember_token' => str_random(10),
  ];
});

$factory->define(App\Counselor::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
		'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
    'email' => $faker->safeEmail,
		'address' => $faker->buildingNumber . " " . $faker->streetName,
		'state' => $faker->state,
		'city' => $faker->city,
		'zip' => $faker->buildingNumber,
		'primary_phone' => $faker->phoneNumber,
		'secondary_phone' => $faker->phoneNumber,
		'unit_num' => $faker->buildingNumber,
		'unit_only' => rand(0, 1),
		'bsa_id' => $faker->randomNumber(7),
  ];
});

$factory->define(App\District::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->company,
  ];
});

$factory->define(App\Council::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->company,
  ];
});


$factory->define(App\Badge::class, function (Faker\Generator $faker) {
  return [
    'code' => rand(1, 300),
    'name' => $faker->word,
  ];
});
