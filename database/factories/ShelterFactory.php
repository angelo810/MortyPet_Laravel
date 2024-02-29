<?php

namespace Database\Factories;

use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShelterFactory extends Factory
{
    protected $model = Shelter::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'address' => $this->faker->name,
			'phone' => $this->faker->name,
			'email' => $this->faker->name,
        ];
    }
}
