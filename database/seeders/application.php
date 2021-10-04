<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class application extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('application')->insert([
            'accountId'=>1,
            
            'type_application'=>'FSIC'

           

        ]);

    }
}
