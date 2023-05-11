<?php

namespace Database\Factories;

use App\Enums\StudentStatusEnum;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    public function definition()
    {
        return [
            'name' =>$this->faker->name(),
            'gender' =>$this->faker->boolean(),
            'birthdate' => $this->faker->dateTimeBetween(startDate:'-30 years', endDate: '-18 years'),
            'status' => $this->faker->randomElement(array:StudentStatusEnum::asArray()),
            'course_id' => Course::inRandomOrder()->value('id'),
        ];
    }
}