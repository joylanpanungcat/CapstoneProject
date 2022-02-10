<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subAssessment extends Model
{
    use HasFactory;
    public $table= 'sub_assessment';
    public $timestamps= false;
    protected $primaryKey ='sub_assessmentId'; 

    public function assessment(){
        $this->belongsTo(assessment::class,'assessmentId','assessmentId');
    }
    
}
