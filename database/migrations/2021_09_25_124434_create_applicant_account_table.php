<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_account', function (Blueprint $table) {
            $table->id('accountId');
            $table->string('Fname');
            $table->string('Lname');
            $table->string('username');
            $table->string('password');
            $table->string('contact_num');
            $table->string('date_register');
            $table->string('image');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_account');
       
    }
}
