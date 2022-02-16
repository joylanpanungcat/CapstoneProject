<?php

namespace Database\Factories;

use App\Models\application;
use Illuminate\Database\Eloquent\Factories\Factory;

class applicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $datetime = $this->faker->dateTimeBetween('now','+11 months');
        $type_application = array('Fire Safety Inspection Certificate', 'Fire Safery Evaluation Clearance','Fire Safety Inspection Certificate for Business','Fire Safety Inspection Certificate for Occupancy');
        $rand_keys = $type_application[array_rand($type_application)];
        
        $type_occupancy = array('Mercantile','Business');
        $rand_occupancy= $type_occupancy[array_rand($type_occupancy)];

        $nature_business= array('Sari-Sari','factory','casino');
        $rand_nature= $nature_business[array_rand($nature_business)];
        $business_name = $this->faker->sentence(rand(5, 7));

        $status = array('approved','pending','reinspection','renewal');
        $rand_status= $status[array_rand($status)];


        $remarks = array('old','new');
        $rand_remarks = $remarks[array_rand($remarks)];
        return [
               
            'type_application'=> $rand_keys,
            'control_number'=>$this->faker->phoneNumber(rand(5, 10)),
            'type_occupancy'=>$rand_occupancy,
            'nature_business'=>$rand_nature,
            'business_name'=>$business_name,
            'Bin'=>rand(1111, 9999),
            'BP_num'=>rand(1111, 9999),
            'status'=>$rand_status,
            'remarks'=>$rand_remarks,
            'date_apply'=>$datetime,
            'OR_num'=>rand(1111, 9999),
            'filenames'=> ''
        ];
    }
}
