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
        foreach(range(1,6000) as $index){
            DB::table('applicant_account')->insert([
            'Fname'=>$faker->name,
            'Lname'=>$faker->lastName,
            'username'=>$faker->lastName,
            'password'=>$faker->password,
            'contact_num'=>$faker->phoneNumber,
            'date_register'=>'september 14,2021',
            'image'=>'nullas',

            ]);
        }
    }
}
