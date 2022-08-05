<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\applicant;
use App\Models\application;
use App\Models\address;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\applicant::factory(10)->create();
        // \App\Models\address::factory(10)->create();
        // \App\Models\application::factory(10)->create();

       applicant::factory(100)->create()->each(function($applicant){
            application::factory(1)->create([
                'applicantId' => $applicant->applicantId
            ])->each(function ($address){
                address::factory(1)->create([
                    'applicantId'=>$address->applicantId,

                ]);
            })->each(function($address){
                address::factory(1)->create([
                    'applicationId'=>$address->applicationId
                ]);
            });
        });


        $this->call([
            admin::class,
            defaultFee::class,
            fees::class,
            inspector::class
        ]);



    }
}
