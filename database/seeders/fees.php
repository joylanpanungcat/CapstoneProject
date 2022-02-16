<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use faker\factory as faker;

class fees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('fees')->insert([
        'natureof_payment'=>'Fire Safety Inspection Fee (For Business and Occupancy)',
        'description'=>'•  Fee charged for the conduct of Fire Safety Inspection equivalent to fifteen percent (15%) of all fees charged by the Local Government Unity, but in no case shall be lower than Five Hundred Pesos.',
        'account_code'=>'code1',
        'assessment_total'=>'500',
        'category'=>'main'
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Failure to comply within the period specified in the affidavit of undertaking',
        'description'=>'•  Fine amounting PhP 37, 500.00 to PhP 50,000.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'main'
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Failure to renew FSIC',
        'description'=>'•  For less than a year.
        - Fine; 50% of the total amount to be paid by the applicant
        • For a year or more
        - Fine; 100% of the total amount to be paid by the applicant for each year of default.',
        'account_code'=>'500',
        'assessment_total'=>'',
        'category'=>'main'
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Fire Code Construction Tax',
        'description'=>'•  One-tenth of one per centum (0.10%) of the verified estimated value of buildings or structures to be erected, from the owner thereof, but not to exceed fifty (Php 50,000.00)',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'main'
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Failure to secure FSEC prior to construction of the building',
        'description'=>'•  Fine amounting Php 37,500 to Php 50,000.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'main'
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Fire Code Realty Tax',
        'description'=>'•  One-hundredth of one per centum (0.01%) of the assessed value of buildings or structures annually payable upon payment of the real estate tax, except on structures used as single family dwellings.',
        'account_code'=>'',
        'assessment_total'=>'',
        'category'=>'main'
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Fire Code Sales Tax',
        'description'=>'•  Two per centium (2%) of gross sales of companies, persons or agents selling firefighting equipment, appliances or devices, including hazard detection and warning systems.',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'main'
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Storage Clearance Fee',
        'description'=>'1. For flammable liquids having flashpoint of -6.67 °C or below, such as gasoline, ether, carbon bisolphide, naptha, benzol (benzene), collodion, aflodin, and acetone.',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'main'
      ]);
      
    
      DB::table('fees')->insert([
        'natureof_payment'=>'a. Appeal fee mentioned under Rule 14 of this RIRR - 1,000.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'b. Certified True copy of Fire Safety Inspection Certificate,
        Building Fire Safety Clearance, and Fire Clearance  -  350.00',
        'account_code'=>'',
        'assessment_total'=>'350',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'c.  Electrical Installation',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'d.  Filing Fee for Fire Safety Evaluation Certificate (FSEC)  - 200.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'e.  Fire Drill            - 1,000.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'f.  Fire Incident Clearance         - 350.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'g.  Fire Prevention and Safety Seminar      -   2,000.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'h.  Fireworks Display         - 1,049.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'i.  Fumigation/Fogging          - 350.00',
        'account_code'=>'',
        'assessment_total'=>'',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'j.  Open Flame            - 525.00',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'k.  Protest Fee mentioned under Rule 14 of this RIRR  - 500.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'l.  Soundstage and Approved Production Facilities and Locations -   2,000.00',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
        'natureof_payment'=>'m.  Welding, Cutting, and other Hotworks',
        'account_code'=>'',
        'assessment_total'=>'500',
        'category'=>'other_fees'
    ]);
    DB::table('fees')->insert([
      'natureof_payment'=>'m.  Welding, Cutting, and other Hotworks',
      'account_code'=>'',
        'assessment_total'=>'500',
      'category'=>'other_fees'
  ]);

    }
}
