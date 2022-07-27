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
            $table->text('under_construction')->nullable();
            $table->text('occupancy_permit')->nullable();
            $table->text('business_permit')->nullable();
            $table->text('periodic_inspection')->nullable();
            $table->text('verification_inspection_compliance')->nullable();
            $table->text('verification_inspection_complaint')->nullable();
            $table->text('others_specify')->nullable();
            //general information
            $table->text('name_building')->nullable();
            $table->text('business_name')->nullable();
            $table->text('address')->nullable();
            $table->text('nature_business')->nullable();
            $table->text('name_owner')->nullable();
            $table->text('owner_contact_no')->nullable();
            $table->text('name_representative')->nullable();
            $table->text('representative_no')->nullable();
            $table->text('no_storey')->nullable();
            $table->text('height_building')->nullable();
            $table->text('portion_occupied')->nullable();
            $table->text('area_per_flr')->nullable();
            $table->text('total_flr_area')->nullable();
            $table->text('fire_insurance')->nullable();
            $table->text('policy_no')->nullable();
            $table->text('date_issued')->nullable();
            $table->text('type_occupancy')->nullable();
            //building construction
            $table->text('beams')->nullable();
            $table->text('exterior')->nullable();
            $table->text('main_stair')->nullable();
            $table->text('main_door')->nullable();
            $table->text('colums')->nullable();
            $table->text('corridor_walls')->nullable();
            $table->text('windows')->nullable();
            $table->text('trussess')->nullable();
            $table->text('flooring')->nullable();
            $table->text('room_partitions')->nullable();
            $table->text('ceiling')->nullable();
            $table->text('roof')->nullable();
            $table->text('sectional_occupancy')->nullable();
            //classification
            $table->text('occupancy_classification')->nullable();
            $table->text('other_classification')->nullable();
            $table->text('occupant_load')->nullable();
            $table->text('any_renoviation')->nullable();
            $table->text('other_renoviation')->nullable();
            $table->text('under_ground')->nullable();
            $table->text('windowless')->nullable();
            //exit details
            $table->text('horizontal_exit')->nullable();
            $table->text('capcity_exit_stair')->nullable();
            $table->text('no_exits')->nullable();
            $table->text('remote')->nullable();
            $table->text('location_exit')->nullable();
            $table->text('enclosure_provided')->nullable();
            //means of egress
            $table->text('ready_accessible')->nullable();
            $table->text('travel_distance')->nullable();
            $table->text('adequete_illumination')->nullable();
            $table->text('panic_hardware')->nullable();
            $table->text('doors_open_easily')->nullable();
            $table->text('bldg_with_mezzanine')->nullable();
            $table->text('corridors')->nullable();
            $table->text('obstructed')->nullable();
            $table->text('dead_ends')->nullable();
            $table->text('proper_rating_illumination')->nullable();
            $table->text('door_swing')->nullable();
            $table->text('self_closure')->nullable();
            $table->text('mezzanne_with_proper_exit')->nullable();
            //fire protection equipment
            $table->string('emergency_lights')->nullable();
            $table->string('illuminated_signs')->nullable();
            $table->string('no_stinguisher')->nullable();
            $table->string('type')->nullable();
            $table->string('capacity')->nullable();
            $table->string('accessible')->nullable();
            $table->string('fire_alarm')->nullable();
            $table->string('detectors')->nullable();
            $table->string('location_panel')->nullable();
            $table->string('functional')->nullable();
            //flammables
            $table->string('hazardous_materials')->nullable();
            $table->string('store_handled')->nullable();
            $table->string('bfp_permnit')->nullable();
            $table->string('stocks_ceiling')->nullable();
            $table->string('sign_provide')->nullable();
            $table->string('smoking_permitted')->nullable();
            $table->string('smoking_where')->nullable();
            $table->string('stoved_used')->nullable();
            $table->string('kind_fuel')->nullable();
            $table->string('smoke_hood')->nullable();
            $table->string('spark_arrester')->nullable();
            $table->string('partition_construction')->nullable();
            //operating features
            $table->string('brigade_organization')->nullable();
            $table->string('brigade_organization_date')->nullable();
            $table->string('safety_seminar')->nullable();
            $table->string('safety_seminar_date')->nullable();
            $table->string('emergency_procedures')->nullable();
            $table->string('emergency_procedures_date')->nullable();
            $table->string('evacuation_drill')->nullable();
            $table->string('evacuation_drill_date')->nullable();
            $table->string('defects')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('verify')->nullable();
            $table->string('status')->nullable();
            $table->string('inspection_of')->nullable();
            $table->string('order_no')->nullable();
            $table->string('team_leader')->nullable();
            $table->string('chief')->nullable();
            $table->string('type_inspection')->nullable();
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
