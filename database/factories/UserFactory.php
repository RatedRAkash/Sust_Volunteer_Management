<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_type' =>'volunteer',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Organization::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'o_name' => $title= $faker->company,
        'phone' => $faker->phoneNumber,
        'website' =>$faker->domainName,
        'logo' =>'logo/download.png',
        'slogan' =>'keep alive the memories in rythm',
        'cover_photo' =>'cover/cover.jpg',
        'description' =>$faker->paragraph(rand(2,10)),
    ];
});
$factory->define(App\Events::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'organization_id' => App\Organization::all()->random()->id,
        'title' => $name = $faker->text,
        'description' =>$faker->paragraph(rand(2,10)),
        'category_id' =>rand(0,1),
        'address' =>$faker->address,
        'status' =>rand(0,1),
        'date' =>$faker->DateTime,
    ];
});
