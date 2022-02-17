<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class defaultFee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('default')->insert([
            'authority_of'=>'Joylan E. Panungcat',
            'fee_assessor'=>'Miggy Ortega',
            'chief'=>'Jay-art Sabandal'
        ]);
    }
}
