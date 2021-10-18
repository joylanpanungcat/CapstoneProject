<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class folderUpload extends Model
{
    use HasFactory;
      public $table ='folder_upload';
    protected $primaryKey ='folderId';
    public $timestamps=false;

        public function application(){
        return $this->belongsTo(application::class,'applicantId','applicantId');
    }
     public function fileUpload(){
        return $this->hasMany(fileUpload::class,'folderId','folderId');
    }

}
