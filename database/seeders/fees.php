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
        'category'=>''
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Failure to comply within the period specified in the affidavit of undertaking',
        'description'=>'•  Fine amounting PhP 37, 500.00 to PhP 50,000.00',
        'category'=>''
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Failure to renew FSIC',
        'description'=>'•  For less than a year.
        - Fine; 50% of the total amount to be paid by the applicant
        • For a year or more
        - Fine; 100% of the total amount to be paid by the applicant for each year of default.',
        'category'=>''
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Fire Code Construction Tax',
        'description'=>'•  One-tenth of one per centum (0.10%) of the verified estimated value of buildings or structures to be erected, from the owner thereof, but not to exceed fifty (Php 50,000.00)',
        'category'=>''
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Failure to secure FSEC prior to construction of the building',
        'description'=>'•  Fine amounting Php 37,500 to Php 50,000.00',
        'category'=>''
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Fire Code Realty Tax',
        'description'=>'•  One-hundredth of one per centum (0.01%) of the assessed value of buildings or structures annually payable upon payment of the real estate tax, except on structures used as single family dwellings.',
        'category'=>''
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Fire Code Sales Tax',
        'description'=>'•  Two per centium (2%) of gross sales of companies, persons or agents selling firefighting equipment, appliances or devices, including hazard detection and warning systems.',
        'category'=>''
      ]);
      DB::table('fees')->insert([
        'natureof_payment'=>'Storage Clearance Fee',
        'description'=>'1. For flammable liquids having flashpoint of -6.67 °C or below, such as gasoline, ether, carbon bisolphide, naptha, benzol (benzene), collodion, aflodin, and acetone.',
        'category'=>''
      ]);
    
    }
}
