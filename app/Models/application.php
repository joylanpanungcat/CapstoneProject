<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;
     public $table='application';
    protected $primaryKey='applicationId';
    public $timestamps=false;
    protected $fillable=['filenames'];

    public function applicant_account(){
        return $this->belongsTo(applicant_account::class,'applicationId');
    }
        public function applicant(){
        return $this->belongsTo(applicant::class,'applicantId');
    }

    public function fileUpload(){
        return $this->hasMany(fileUpload::class,'applicationId');
    }
   
  
    public function setFilenamesAttribute($value){
        $this->attributes['filenames']=json_encode($value);
    }
}
