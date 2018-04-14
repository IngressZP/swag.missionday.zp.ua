<?php

use Faker\Generator as Faker;
use App\Models\Order;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'telegram_nick' => $faker->userName,
        'ingress_nick' => $faker->userName,
        'email' => rand(1,4) > 2 ? $faker->email : NULL,
        'phone' => rand(1,4) > 2 ? $faker->e164PhoneNumber : NULL,
        'city' => rand(1,4) > 2 ? $faker->city : NULL,
        'total' => $faker->numberBetween(50, 500),
        'created_at' => $faker->dateTime,
    ];
});
