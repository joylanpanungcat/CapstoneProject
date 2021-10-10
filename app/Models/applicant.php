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

public function application(){
    return $this->hasMany(application::class,'applicantId');
}

public function address(){
    return $this->hasOne(address::class,'applicantId');
}



}
