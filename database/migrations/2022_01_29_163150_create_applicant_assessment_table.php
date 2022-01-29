<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_assessment', function (Blueprint $table) {
            $table->id();
            $table->string('account_code')->nullable();
            $table->string('total')->nullable();
            $table->string('total_amount_words')->nullable();
            $table->string('receipt_no')->nullable();
            

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
        Schema::dropIfExists('applicat_assessment');
    }
}
