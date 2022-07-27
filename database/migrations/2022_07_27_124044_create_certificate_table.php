<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate', function (Blueprint $table) {
            $table->id('cert_id');
            $table->unsignedBigInteger('applicationId');
            $table->string('complete_address')->nullable();
            $table->string('fsec_noCert')->nullable();
            $table->string('toBe_constructed')->nullable();
            $table->string('issued_for')->nullable();
            $table->string('chiefCert')->nullable();
            $table->string('marshalCert')->nullable();
            $table->string('date_issuedCert')->nullable();
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
        Schema::dropIfExists('certificate');
    }
}
