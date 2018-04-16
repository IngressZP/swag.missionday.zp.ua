<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween(10, 300),
        'category_id' => $faker->numberBetween(1, 5),
        'main_image' => 'uploads/S6DjNVYGGqRbDQsWVCAJ0gcTu7oxThGXs1GECOCk.jpeg',
        'uk' => [
            'name' => implode(" ", $faker->words(3)),
            'description' => $faker->paragraph,
        ],
        'ru' => [
            'name' => implode(" ", $faker->words(3)),
            'description' => $faker->paragraph,
        ],
        'en' => [
            'name' => implode(" ", $faker->words(3)),
            'description' => $faker->paragraph,
        ],
    ];
});
