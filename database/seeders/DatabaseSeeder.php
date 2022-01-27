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
        foreach(range(1,500) as $index){
            DB::table('application')->insert([
                
            'applicantId'=>$i++,
            'type_application'=>'Fire Safety Inspection Certificate',
            'control_number'=>$faker->phoneNumber,
            'type_occupancy'=>'Mercantile',
            'nature_business'=>'Sari-Sari',
            'business_name'=>'Joylan',
            'inpector_id'=>'',
            'remarks'=>'peding',
            'date_apply'=>date("Y-m-d"),
            'filenames'=>''


            ]);
        }
 

    }
}
