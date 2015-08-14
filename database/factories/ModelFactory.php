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

use Faker\Generator;
use Grocer\Models\Ingredient;
use Grocer\Models\Recipe;
use Grocer\Models\RecipeStep;
use Grocer\Models\WeeklyList;

//
//$factory->define(Grocer\User::class, function (Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});


$factory->define(Recipe::class, function (Generator $faker){
    return [
        'name' => ucwords($faker->word)
    ];
});

$factory->define(RecipeStep::class, function (Generator $faker){
    return [
        'instruction' => $faker->text(140),
        'duration_seconds' => $faker->numberBetween(10, 500)
    ];
});

$factory->define(WeeklyList::class, function (Generator $faker){
   return [
       'starts_at' => $faker->dateTimeThisMonth
   ];
});


$factory->define(Ingredient::class, function (Generator $faker){
    return [
        'name' => ucwords($faker->word),
        'store_section' => ucwords($faker->word)
    ];
});