<?php

namespace Database\Factories;

use App\Models\Startup;
use Illuminate\Database\Eloquent\Factories\Factory;

class StartupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Startup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'img' => "ggg.png",
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'kindstartup_id' => \App\Models\Kindstartup::inRandomOrder()->first()->id,
        ];
    }
}
