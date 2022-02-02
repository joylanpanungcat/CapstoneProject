<?php

namespace Database\Factories;

use App\Models\applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class applicantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = applicant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'Fname'=> $this->faker->firstName,
            'Lname'=>$this->faker->lastName,
            'Mname'=>$this->faker->lastName,
            'contact_num'=>$this->faker->phoneNumber,
            'alcontact'=>$this->faker->phoneNumber,
        ];
    }
}
