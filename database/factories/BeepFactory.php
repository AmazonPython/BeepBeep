<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Beep;
use Faker\Generator as Faker;

$factory->define(Beep::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'content' => $faker->sentence
    ];
});
