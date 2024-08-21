<?php

namespace Database\Factories;

use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passenger>
 */
class PassengerFactory extends Factory
{
    /**
     * Define the model's default state.
     *@var string
     protected $model = Passenger::class;
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'FirstName'=>$this->faker->firstname,
            'LastName'=>$this->faker->lastname,
            'email'=>$this->faker->unique()->safeEmail,
            'password'=>bcrypt('password'),
            'DateOfBirth'=>$this->faker->dateTimeBetween('now', '+10 years')->format('y-m-d'),
            //
        ];
    }
}
