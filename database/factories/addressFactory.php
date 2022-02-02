<?php

namespace Database\Factories;

use App\Models\address;
use Illuminate\Database\Eloquent\Factories\Factory;

class addressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $barangay = array('New pandan','New Visayas','Caganguhan','Gredu');
        $rand_barangay= $barangay[array_rand($barangay)];
        return [
            'purok'=>'prk'.'-'.rand(1,10),
            'barangay'=>$rand_barangay,
            'city'=>'Panabo City',
        ];
    }
}
