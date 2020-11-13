<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Teacher;
use App\Models\TeacherType;
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

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'phone' =>'0123456789',
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'avatar'=>$faker->imageUrl(150, 150, 'cats'),
        'date_of_birth' => $faker->date(),
        'gender' => 0,
        'teacher_type_id' => TeacherType::inRandomOrder()->first()->id,
        'status' => 1
        
        
    ];
});
