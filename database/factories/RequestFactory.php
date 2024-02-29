<?php

namespace Database\Factories;

use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RequestFactory extends Factory
{
    protected $model = Request::class;

    public function definition()
    {
        return [
			'request_date' => $this->faker->name,
			'pet_id' => $this->faker->name,
			'client_name' => $this->faker->name,
			'message' => $this->faker->name,
        ];
    }
}
