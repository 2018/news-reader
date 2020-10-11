<?php

$factory->define(
    \App\Models\User::class, function (Faker\Generator $faker) {

        return [
            'id' => $faker->uuid,
            'name' => 'user_' . $faker->randomNumber,
            'email' => $faker->unique()->safeEmail,
            'password' => 'password',
        ];
    }
);
