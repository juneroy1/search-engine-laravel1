<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
class StudentModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;
        $middleName = $this->faker->lastName;
        $address = $this->faker->address();
        $birthdate = $this->faker->date();
        $description = $this->faker->text($maxNbChars = 255);
         return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'middle_name' => $middleName,
            'address' => $address,
            'birthdate' => $birthdate,
            'description' => $description,
        ];
    }
}
