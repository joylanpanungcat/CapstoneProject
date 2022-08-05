<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->id('applicationId');

      //       $table->unsignedBigInteger('applicantId')->nullable();
      //        $table->foreign('applicantId')->references('applicantId')->on('applicant') ->onUpdate('cascade')
      // ->onDelete('cascade');
             $table->unsignedBigInteger('applicantId')->nullable();
    //          $table->foreign('applicantId')->references('applicantId')->on('applicant') ->onUpdate('cascade')
    //   ->onDelete('cascade');


            $table->unsignedBigInteger('accountId')->nullable();
    //          $table->foreign('accountId')->references('accountId')->on('applicant_account') ->onUpdate('cascade')
    //   ->onDelete('cascade');


            $table->string('contractor') ->nullable();
            $table->string('representative') ->nullable();
            $table->string('floorArea') ->nullable();
            $table->string('noStorey') ->nullable();
            $table->string('type_application') ->nullable();
            $table->string('control_number') ->nullable();
            $table->string('type_occupancy') ->nullable();
            $table->string('nature_business') ->nullable();
            $table->string('business_name')->nullable();
            $table->string('inpector_id')->nullable();
            $table->string('Bin')->nullable();
            $table->string('BP_num')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('date_apply')->nullable();
            $table->string('OR_num')->nullable();
            $table->string('count')->nullable();
            $table->string('count2')->default(1);
            $table->string('date_approved')->nullable();
            $table->string('due_date')->nullable();
            $table->string('filenames');
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->string('passCode')->nullable();

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
        Schema::dropIfExists('application');
    }
}
