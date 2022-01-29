<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class other_fees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
    DB::table('other_fees')->insert([
        'other_fees'=>'a. Appeal fee mentioned under Rule 14 of this RIRR - 1,000.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'b. Certified True copy of Fire Safety Inspection Certificate,
        Building Fire Safety Clearance, and Fire Clearance  -  350.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'c.  Electrical Installation'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'d.  Filing Fee for Fire Safety Evaluation Certificate (FSEC)  - 200.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'e.  Fire Drill            - 1,000.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'f.  Fire Incident Clearance         - 350.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'g.  Fire Prevention and Safety Seminar      -   2,000.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'h.  Fireworks Display         - 1,049.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'i.  Fumigation/Fogging          - 350.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'j.  Open Flame            - 525.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'k.  Protest Fee mentioned under Rule 14 of this RIRR  - 500.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'l.  Soundstage and Approved Production Facilities and Locations -   2,000.00'
    ]);
    DB::table('other_fees')->insert([
        'other_fees'=>'m.  Welding, Cutting, and other Hotworks'
    ]);

    }
}
