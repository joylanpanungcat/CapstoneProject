<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id('scheduleId');
            $table->unsignedBigInteger('applicantId')->nullable();
            $table->unsignedBigInteger('applicationId')->nullable();
            $table->unsignedBigInteger('inspectorId')->nullable();
            $table->string('date_inspection')->nullable();
            $table->string('inspected')->nullable();
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
        Schema::dropIfExists('schedule');
    }
}
