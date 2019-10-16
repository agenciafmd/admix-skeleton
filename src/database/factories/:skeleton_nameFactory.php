<?php

use;
use Faker\Generator;

:
namespace_vendor\:namespace_skeleton_name\:skeleton_name;

$factory->define(:skeleton_name::class, function (Generator $faker)
{
    return [
        'is_active' => $faker->optional(0.3, 1)
            ->randomElement([0]),
        'name' => $faker->name,
    ];
});
