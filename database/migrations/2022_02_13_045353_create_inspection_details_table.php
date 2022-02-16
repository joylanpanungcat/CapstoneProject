<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_details', function (Blueprint $table) {
            $table->id('inspection_id');
            $table->unsignedBigInteger('inspectorId')->nullable();
            $table->unsignedBigInteger('applicationId')->nullable();
            $table->string('date_inspect')->nullable();
            $table->string('beams')->nullable();
            $table->string('exterior')->nullable();
            $table->string('main_stair')->nullable();
            $table->string('main_door')->nullable();
            $table->string('colums')->nullable();
            $table->string('corridor_walls')->nullable();
            $table->string('windows')->nullable();
            $table->string('trussess')->nullable();
            $table->string('flooring')->nullable();
            $table->string('room_partitions')->nullable();
            $table->string('ceiling')->nullable();
            $table->string('roof')->nullable();
            $table->string('sectional_occupancy')->nullable();
            $table->string('emergency_lights')->nullable();
            $table->string('no_stinguisher')->nullable();
            $table->string('fire_alarm')->nullable();
            $table->string('location_panel')->nullable();
            $table->string('defects')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('verify')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('inspection_details');
    }
}
