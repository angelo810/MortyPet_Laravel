<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PetFactory extends Factory
{
    protected $model = Pet::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'age' => $this->faker->name,
			'description' => $this->faker->name,
			'breed_id' => $this->faker->name,
			'image_url' => $this->faker->name,
			'available' => $this->faker->name,
        ];
    }
}
