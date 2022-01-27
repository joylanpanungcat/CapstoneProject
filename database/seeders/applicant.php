<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class applicant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        $i=0;
        foreach(range(1,500) as $index){
            DB::table('applicant')->insert([
     
            
            'Fname'=>'joylan'.$i++,
            'Lname'=>'panungcat'.$i++,
            'Mname'=>'E'.$i++,
            'contact_num'=>$faker->phoneNumber,
            'alcontact'=>$faker->phoneNumber.$i++,
            


            ]);
        }
    }
}
