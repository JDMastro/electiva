<?php

namespace Database\Factories;

use App\Models\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

class QualificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qualification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rate' => rand(0,5),
            'startup_id' => \App\Models\Startup::inRandomOrder()->first()->id,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id
        ];
    }
}
