<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class inspector extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspector')->insert([
          
            'Fname'=>'Mark',
            'Lname'=>'Bryant',
            'Position'=>'FO2',
            'username'=>'inspector',
            'password'=>'inspector',
        ]);
    }
}
