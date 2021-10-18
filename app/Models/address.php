<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class address extends Model
{
    use HasFactory;

      public $table ='address';
    protected $primaryKey ='addressId';
    public $timestamps=false;
    protected $dates=['deleted_at'];

   public function application(){
        return $this->belongsTo(application::class,'applicationId');
    }
      public function applicant(){
        return $this->belongsTo(applicant::class,'applicantId','applicantId');
    }
}
