<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id('addressId');
             $table->unsignedBigInteger('applicationId')->nullable();
             $table->foreign('applicationId')->references('applicationId')->on('application') ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('applicantId')->nullable();
             $table->foreign('applicantId')->references('applicantId')->on('applicant') ->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('purok')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('address');
    }
}
