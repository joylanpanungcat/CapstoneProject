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
            $table->string('Fname')->nullable();
            $table->string('Lname')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('contact_num')->nullable();
            $table->string('alternative_num')->nullable();
            $table->string('date_register')->nullable();
            $table->string('image')->nullable();
            $table->rememberToken();
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
