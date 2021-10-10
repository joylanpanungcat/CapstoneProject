<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker=Faker::create();
        $i=0;
        foreach(range(1,6000) as $index){
            DB::table('application')->insert([
            'type_application'=>'Fire Safety Inspection Certificate',
            'control_number'=>$faker->phoneNumber,
            'type_occupancy'=>'Mercantile',
            'nature_business'=>'Sari-Sari'.$i++,
            'Fname'=>$faker->firstName,
            'status'=>'Approved',
            'remarks'=>'Old',
            'Lname'=>$faker->lastName,
            'Mname'=>'nullas',
            'contact_num'=>'09454453331',
            'alcontact'=>'123',
            'purok'=>'Prk2',
            'barangay'=>'San Francisco',
            'city'=>'Panabo ',
            'filenames'=>''


            ]);
        }
    }
}
