<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class application extends Model
{
    use HasFactory;
    use SoftDeletes;
     public $table='application';
    protected $primaryKey='applicationId';
    public $timestamps=false;
    protected $fillable=['filenames'];
    protected $dates=['deleted_at'];

    public function applicant_account(){
        return $this->belongsTo(applicant_account::class,'applicationId');
    }
        public function applicant(){
        return $this->belongsTo(applicant::class,'applicantId','applicantId');
    }

    public function fileUpload(){
        return $this->hasMany(fileUpload::class,'applicationId','applicationId');
    }
    public function folderUpload(){
        return $this->hasMany(folderUpload::class,'applicationId','applicationId');
    }
    public function assessment(){
        $this->hasOne(assessment::class,'applicationId','applicationId');
    }
   
   
  
    public function setFilenamesAttribute($value){
        $this->attributes['filenames']=json_encode($value);
    }
}
