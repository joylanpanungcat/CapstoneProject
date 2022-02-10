<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assessment extends Model
{
    use HasFactory;
    public $table='assessment';
    public $timestamps= false;
    public $primaryKey ='assessmentId';
    
    public function applicant(){
        $this->belongsTo(applicant::class,'applicantId','applicantId');
    }
    public function subAssessment(){
        $this->hasOne(subAssessment::class,'assessmentId','assessmentId');
    }
}
