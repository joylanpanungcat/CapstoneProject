<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fileUpload extends Model
{
    use HasFactory;
    public $table ='file_upload';
    protected $primaryKey ='fileId';
    public $timestamps=false;
   

    public function application(){
        return $this->belongsTo(application::class,'applicationId');
    }
}
