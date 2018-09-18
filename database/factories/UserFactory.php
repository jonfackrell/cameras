<?php


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

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('secret'),
        'remember_token' => str_random(10),
        'department' => 1
    ];
});*/

$factory->define(App\Patron::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'inumber' => $faker->unique()->safeEmail,
        'netid' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement($array = array ('STU', 'FAC')),
        'cameras_access_end_date' => $faker->optional()->dateTimeInInterval($startDate = 'now', $interval = '+ 5 years', $timezone = 'UTC')
    ];
});

$factory->define(App\Checkout::class, function (Faker\Generator $faker) {
    return [
    	'patron_id' => $faker->numberBetween(1, 100),
    	'equipment_id' => $faker->numberBetween(1, 100),
        'checked_out_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'UTC') ,
        'checked_out_by' => $faker->numberBetween(1, 10),
        'due_at' => $faker->dateTimeInInterval($startDate = '-5 days', $interval = '+ 25 days', $timezone = 'UTC'),
        'checkout_note' => $faker->optional()->paragraph(2)
    ];
});

$factory->define(App\Equipment::class, function (Faker\Generator $faker) {
    return [
        'barcode' => $faker->unique()->ean8,
        'item' => $faker->unique()->bothify('???-###')
    ];
});
