<?php

namespace Database\Factories;

use App\Models\Breed;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BreedFactory extends Factory
{
    protected $model = Breed::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'size' => $this->faker->name,
        ];
    }
}
