<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToCorrectDefectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_correct_defects', function (Blueprint $table) {
            $table->id('defect_id');
            $table->unsignedBigInteger('notice_id');
            $table->string('defects');
            $table->string('grace_period');
            $table->string('status')->default('uncomplied');
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
        Schema::dropIfExists('to_correct_defects');
    }
}
