<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class applicant_account extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('applicant_account')->insert([
            'Fname'=>'joylan',
            'Lname'=>'Panungcat',
            'password'=>'123',
            'contact_num'=>'12345',
            'date_register'=>'september 14,2021',
            'image'=>'nullas',

        ]);

    }
}
