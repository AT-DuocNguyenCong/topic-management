<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'username' => $faker->unique()->userName,
        'password' => $password ?: $password = bcrypt('secret'),
        'email' => $faker->unique()->safeEmail,
        'full_name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'is_admin' => $faker->boolean(),
        'faculty' => $faker->randomElement(['Công nghệ thông tin', 'Công nghệ thông tin', 'Điện - Điện tử', 'Điện tử - Viễn thông', 'Tự động hóa']),
        'major' => $faker->randomElement(['Kỹ sư phần mềm', 'Kỹ sư điện', 'Kiểm thử', 'Kiểm thử', 'Chuyên viên mạng']),
        'hometown' => $faker->country,
        'place_of_birth' => $faker->city,
        'birthday' => $faker->date($format = 'Y-m-d', $max = '2000-3-23'),
        'company' => $faker->company,
        'position' => $faker->jobTitle,
    ];
});

$factory->define(App\Field::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->catchPhrase,
    ];
});

$factory->define(App\Level::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence($nbWords = 3, $variableNbWords = true),
    ];
});

$factory->define(App\AcademicRank::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => $faker->numberBetween($min = 1, $max = 2),
        'description' => $faker->text,
    ];
});

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'fields_id' => $faker->numberBetween($min = 1, $max = 5),
        'level_id' => $faker->numberBetween($min = 1, $max = 5),
        'expense' => $faker->numberBetween($min = 10000000, $max = 100000000),
        'over_view' => $faker->text,
        'urgency' => $faker->randomElement(['Very Low', 'Low', 'Nomal', 'High', 'Very High']),
        'goal' => $faker->text,
        'own_user_id' => $faker->numberBetween($min = 1, $max = 15),
        'method' => $faker->text,
        'status' => $faker->numberBetween($min = 0, $max = 3),
        'date_end' => $faker->date($format = 'Y-m-d', $min = '2030-3-23'),
        'date_begin' => $faker->date($format = 'Y-m-d', $max = '2005-3-23'),


    ];
});
