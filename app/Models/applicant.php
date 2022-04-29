<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class applicant extends Model
{
    use HasFactory;
    public $table='applicant';
    protected $primaryKey='applicantId';
    public $timestamps=false;
     protected $fillable=['applicantId','Fname','Lname','Mname','contact_num','alcontact'];

public function application(){
    return $this->hasMany(application::class,'applicantId','applicantId');
}

public function address(){
    return $this->hasOne(address::class,'applicantId','applicantId');
}

public function assessment(){
    return $this->hasMany(assessment::class,'applicantId','applicantId');
}



}
