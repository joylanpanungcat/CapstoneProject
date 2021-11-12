<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    public $table ='folder_activity';
    protected $primaryKey ='activityId';
    public $timestamps=false;
    
     public function folderUpload(){
        return $this->belongsTo(folderUpload::class,'folderId','folderId');
    }
}
