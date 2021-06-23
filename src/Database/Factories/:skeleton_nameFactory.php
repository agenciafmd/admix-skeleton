<?php

namespace :namespace_vendor\:namespace_skeleton_name\Database\Factories;

use :namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name;
use Illuminate\Database\Eloquent\Factories\Factory;

class :skeleton_nameFactory extends Factory
{
    protected $model = :skeleton_name::class;

    public function definition()
    {
        return [
            'is_active' => $this->faker->optional(0.2, 1)
                ->randomElement([0]),
            'star' => $this->faker->optional(0.2, 1)
                ->randomElement([0]),
            'name' => $this->faker->name,
            'sort' => null,
        ];
    }
}