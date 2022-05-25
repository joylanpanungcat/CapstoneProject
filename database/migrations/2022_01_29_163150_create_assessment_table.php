<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment', function (Blueprint $table) {
            $table->id('assessmentId');
            $table->unsignedBigInteger('applicantId')->nullable();
            $table->unsignedBigInteger('applicationId')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('total_amount_words')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('defaultId')->nullable();
            $table->string('amount_paid')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('change')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('type_payment')->nullable();
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
        Schema::dropIfExists('assessment');
    }
}
