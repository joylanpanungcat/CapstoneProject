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
            $table->unsignedBigInteger('accountId')->nullable();
            $table->string('type_application')->nullable();
            $table->string('Fname')->nullable();
            $table->foreign('accountId')->references('accountId')->on('applicant_account');
            $table->string('filenames');
         
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
