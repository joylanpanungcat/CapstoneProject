<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_upload', function (Blueprint $table) {
            $table->id('folderId');
            $table->unsignedBigInteger('applicationId')->nullable();
            $table->string('folderName')->nullable();
            $table->string('uploader')->nullable();
            $table->string('created')->nullable();
            $table->string('lastModified')->nullable();
            $table->unsignedBigInteger('parentId')->nullable();
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
        Schema::dropIfExists('folder_upload');
    }
}
