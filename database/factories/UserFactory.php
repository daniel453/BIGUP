<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>$this->faker->sentence(),
            'apellido' => $this->faker->sentence(),
            'cedula'=> $this->faker->randomElement([1000211210,021211101,1000019890]),
            'email'=> $this->faker->unique()->safeEmail(),
            'password' => bcrypt('dani79sd'),
            'contingente' => $this->faker->randomElement([321,123,121])
        ];
    }
}
