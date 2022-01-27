<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class address extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('address')->insert([
            'applicationId'=>'1',
            'purok'=>'prk2',
            'barangay'=>'new pandan',
            'city'=>'panabo city',

        ]);

    }
}
