<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Dennis\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
  $title = $faker->sentence()
    return [
        //

        'title' => $title,
        'slug' => str_slug($title)
        'image_url' => $faker->imageUrl(),
        'description' => $faker->paragraph()
    ];
});
