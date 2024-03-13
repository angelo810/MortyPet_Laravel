<?php

namespace Database\Factories;

use App\Models\ShelterPet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShelterPetFactory extends Factory
{
    protected $model = ShelterPet::class;

    public function definition()
    {
        return [
			'shelter_id' => $this->faker->name,
			'pet_id' => $this->faker->name,
        ];
    }
}
