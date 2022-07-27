<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeToCorrectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_to_correct', function (Blueprint $table) {
            $table->id('notice_id');
            $table->unsignedBigInteger('inspection_id');
            $table->string('letter_head')->nullable();
            $table->string('date_issued')->nullable();
            $table->string('servicing_bank')->nullable();
            $table->string('truly_yours')->nullable();
            $table->string('date');
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
        Schema::dropIfExists('notice_to_correct');
    }
}