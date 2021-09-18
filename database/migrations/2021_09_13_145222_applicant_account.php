<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplicantAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_account', function (Blueprint $table) {
            $table->id('account_id');
            $table->string('Fname');
            $table->string('Lname');
            $table->string('password');
            $table->string('contact_num');
            $table->string('date_register')->nullable();
            $table->string('image')->nullable();
             // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
